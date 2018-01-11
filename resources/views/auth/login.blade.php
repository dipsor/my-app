<div
        class="fb-like"
        data-share="true"
        data-width="450"
        data-show-faces="true">
</div>

@extends('auth.custom.layouts')
@section('content')
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 center">
                    {{--<img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">--}}
                    <p class="center login-form-text">Skeleton Dashboard</p>
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
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <input name="remember" type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }} />
                    <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="row login-row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light col s12">Login</button>
                </div>
            </div>
            <div class="row facebook-row">
                <div class="input-field col s12">
                    <div class="social-wrap a">
                        <a href="{{route('facebook.login')}}" id="facebook">Sign in with Facebook</a>
                    </div>
                </div>
            </div>

            <div class="row google-row">
                <div class="input-field col s12">
                    <div class="social-wrap a">
                        <a href="{{route('google.login')}}" id="googleplus">Sign in with Google</a>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="{{ route('password.request') }}">Forgot password ?</a></p>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

