<?php

    namespace App\Providers;

    use App\Actions\Fortify\CreateNewUser;
    use App\Actions\Fortify\ResetUserPassword;
    use App\Actions\Fortify\UpdateUserPassword;
    use App\Actions\Fortify\UpdateUserProfileInformation;
    use App\Models\User;
    use Illuminate\Auth\Events\Lockout;
    use Illuminate\Cache\RateLimiting\Limit;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\RateLimiter;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Support\Str;
    use Laravel\Fortify\Fortify;

    class FortifyServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Generate a unique key for throttling based on the user's username, IP address and user agent.
         *
         * @param Request $request The HTTP request instance.
         *
         * @return string The generated throttle key.
         */
        protected function throttleKey(Request $request): string
        {
            return Str::lower($request->input(Fortify::username())) . '|' . $request->ip() . '|' . $request->userAgent();
        }

        /**
         * Bootstrap any application services.
         */
        public function boot(): void
        {
            Fortify::authenticateUsing(function (Request $request) {
                $user = User::whereEmail($request->email)->first();

                if ($user && Hash::check($request->password, $user->password)) {
                    if ($user->is_active) {
                        return $user;
                    } else {
                        Session::flash('toast', [
                            'type' => 'warning',
                            'message' => __("admin.auth.inactive_account"),
                        ]);
                        return null;
                    }
                }

                RateLimiter::hit($this->throttleKey($request));

                if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
                    event(new Lockout($request));
                    $available = RateLimiter::availableIn($this->throttleKey($request));

                    Session::flash('toast', [
                        'type' => 'danger',
                        'message' => __("admin.auth.too_many_attempts", ['time' => $available]),
                    ]);

                    return null;
                }

                Session::flash('toast', [
                    'type' => 'danger',
                    'message' => __("admin.auth.invalid_credentials"),
                ]);
                return null;
            });

            Fortify::createUsersUsing(CreateNewUser::class);
            Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
            Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
            Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

            Fortify::loginView(fn() => view('admin.auth.login'));

            RateLimiter::for('login', function (Request $request) {
                $throttleKey = Str::transliterate($this->throttleKey($request));

                return Limit::perMinute(5)->by($throttleKey);
            });

            RateLimiter::for('two-factor', function (Request $request) {
                return Limit::perMinute(5)->by($request->session()->get('login.id'));
            });
        }
    }
