@extends('layouts.app')

@section('title', Lang::get('app.register'))

@section('content')
<div class="container grid-480">
    <div class="columns">
        <div class="column col-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.register')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="name">@lang('form.name')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" required />
                                @if ($errors->has('name'))
                                    <p class="form-input-hint">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="email">@lang('form.email')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" id="email" name="email" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                    <p class="form-input-hint">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password">@lang('form.password')</label>
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
                                <label class="form-label" for="password-confirm">@lang('form.confirm_password')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="password" id="password-confirm" name="password_confirmation" required />
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <button class="btn btn-primary" type="submit">@lang('app.register')</button>
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    @lang('app.already_have_an_account')
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
