@extends('layouts.default')

@section('content')
    <div class="ui page centered grid" id="login-box">
        <div class="column">
            <h3 class="ui top attached header">
                Reset Password
            </h3>

            <div class="ui attached segment">
                @include('partials.messages')

                <form action="{{ url('/password/email') }}" method="post" class="ui form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="field">
                        <label>Email</label>

                        <div class="ui icon input">
                            <input type="email" name="email" placeholder="Email" required>
                            <i class="user icon"></i>
                        </div>
                    </div>

                    <button class="ui button">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
