@extends('layouts.app')

@section('content')
<div class="container grid-480">
    <div class="columns">
        <div class="column col-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.reset_password')</div>
                </div>
                <div class="panel-body">
                
                    @if (session('status'))
                        <div class="toast toast-success">
                            <button class="btn btn-clear float-right"></button>
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="email">@lang('app.form.email')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" id="email" name="email" value="{{ $email or old('email') }}" required />
                                @if ($errors->has('email'))
                                    <p class="form-input-hint">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password">@lang('app.form.password')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" id="password" name="password" required />
                                @if ($errors->has('password'))
                                    <p class="form-input-hint">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password-confirm">@lang('app.form.confirm_password')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="password" id="password-confirm" name="password_confirmation" required />
                            </div>
                        </div> 

                        <button class="btn btn-primary" type="submit">@lang('app.reset_password')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
