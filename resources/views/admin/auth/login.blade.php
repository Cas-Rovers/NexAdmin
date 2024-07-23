@extends('admin.layouts.app')

@section('content')
    <div class="login login-with-artwork">
        <div class="login-container">
            <div class="login-header mb-3">
                <div class="logo-box">
                    <img src="path_to_logo" alt="Logo" class="logo">
                </div>
                <h1 class="title">{{ __('Login') }}</h1>
            </div>
            <div class="login-content">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group email-input">
                        <input id="email" type="email" name="email" placeholder="E-mail"
                               value="{{ old('email') }}"
                               class="form-field @error('email') is-invalid @enderror" autocomplete="email" required>
                        <label class="form-label field-label" for="email">{{ __('E-mail') }}</label>
                    </div>
                    <div class="form-group password-input">
                        <input id="password" type="password" name="password" placeholder="Password"
                               value="{{ old('password') }}"
                               class="form-field @error('password') is-invalid @enderror"
                               autocomplete="current-password"
                               required>
                        <label class="form-label field-label" for="password">{{ __('Password') }}</label>
                    </div>
                    <div class="form-group remember-me-btn">
                        <input id="remember-me" type="checkbox" name="remember-me"
                               class="form-check-input">
                        <label class="form-check-label" for="remember-me">{{ __('Remember me') }}</label>
                    </div>
                    <div class="form-group">
                        <input id="submit-btn" type="submit" class="login-btn" value="Login">
                    </div>
                    <div class="form-group">
                        <p class="d-flex gap-2 justify-content-center reset-password-link">
                            {{ __('Forgot password?') }}
                            <span>
                                <a href="{{ route('password.request') }}" class="link">{{ __('Reset') }}</a>
                            </span>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="artwork">
            <!-- Add your artwork images here -->
            {{-- // --}}
            <!-- Add other artwork elements as needed -->
        </div>
    </div>
@endsection
