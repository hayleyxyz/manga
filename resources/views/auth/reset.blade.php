@extends('layouts.default')

@section('content')
    <div class="ui page centered grid" id="login-box">
        <div class="column">
            <h3 class="ui top attached header">
                Reset password
            </h3>

            <div class="ui attached segment">
                @include('partials.messages')

                <form action="{{ url('/password/reset') }}" method="post" class="ui form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field">
                        <label>Email</label>

                        <div class="ui icon input">
                            <input type="email" name="email" placeholder="Email" required value="{{{ old('email') }}}">
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

                    <div class="field">
                        <label>Password confirmation</label>

                        <div class="ui icon input">
                            <input type="password" name="password_confirmation" placeholder="Password confirmation" required>
                            <i class="lock icon"></i>
                        </div>
                    </div>

                    <button class="ui button">Reset password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
