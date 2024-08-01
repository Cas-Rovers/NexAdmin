<?php

    namespace App\Providers;

    use Illuminate\Support\Facades\Blade;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Support\ServiceProvider;
    use Lang;

    class AppServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap any application services.
         */
        public function boot(): void
        {
            // Implicitly grant "Super Admin" role all permissions
            // This works in the app by using gate-related functions like auth()->user->can() and @can()
            Gate::before(function ($user, $ability) {
                return $user->hasRole('Super Admin') ? true : null;
            });

            Blade::componentNamespace('App\\View\\Components\\Admin', 'admin');
            Blade::componentNamespace('App\\View\\Components\\Frontend', 'frontend');

            view()->composer('admin.components.language-switcher', function ($view) {
                $view->with('current_locale', app()->getLocale());
                $view->with('available_locales', config('app.available_locales'));
            });
        }
    }
