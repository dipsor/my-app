@extends('auth.custom.layouts')
@section('content')
    <div id="login-page" class="row">
        <div class="col s12 z-depth-4 card-panel">
            <form class="login-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 center">
                        <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                        <p class="center login-form-text">Skeleton Dashboard</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                        <label for="name" class="center-align">Name</label>
                        @if ($errors->has('name'))
                            <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email" class="center-align">Email</label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password" type="password" name="password" required>
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required>
                        <label for="password_confirmation">Confirm Password</label>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m12 l12  login-text">
                        <input name="remember" type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }} />
                        <label for="remember-me">Remember me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s12">Register</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <p class="margin center medium-small sign-up">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection