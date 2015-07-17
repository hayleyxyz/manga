@extends('layouts.default')

@section('content')
    <div class="ui page centered grid" id="login-box">
        <div class="column">
            <h3 class="ui top attached header">
                Sign in
            </h3>

            <div class="ui attached segment">
                @include('partials.messages')

                <form method="post" action="{{ url('/auth/login')  }}" class="ui form">
                    <input type="hidden" name="_token" value="{{ csrf_token()  }}">

                    <div class="field">
                        <label>Email</label>

                        <div class="ui icon input">
                            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <div class="field">
                        <label>Password</label>

                        <div class="ui icon input">
                            <input type="password" name="password" placeholder="Password" required>
                            <i class="lock icon"></i>
                        </div>
                    </div>

                    <div class="two fields">
                        <div class="field">
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="remember" checked>
                                <label>Remember Me</label>
                            </div>
                        </div>

                        <div class="right aligned field">
                            <a href="{{ url('/password/email') }}">Forgot your password?</a>
                        </div>
                    </div>

                    <button class="ui button">Sign in</button>
                </form>
            </div>
        </div>
    </div>
@stop
