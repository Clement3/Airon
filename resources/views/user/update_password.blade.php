@extends('layouts.app')

@section('title', Lang::get('app.update_password'))

@section('content')
<div class="container grid-960">
    <div class="columns">

        <div class="column col-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                    @lang('app.home')
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ action('UserController@getSettings') }}">
                    @lang('app.settings')
                    </a>
                </li>                
                <li class="breadcrumb-item">
                    @lang('app.update_password')
                </li>
            </ul>        
        </div>

        @include('user.menu')

        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.update_password')</div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ action('UserController@postUpdatePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="form-label" for="old_password">@lang('form.old_password')</label>
                            <input class="form-input{{ $errors->has('old_password') ? ' is-danger' : '' }}" type="password" id="old_password" name="old_password" required />
                            @if ($errors->has('old_password'))
                                <p class="form-input-hint">{{ $errors->first('old_password') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password">@lang('form.new_password')</label>
                            <input class="form-input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" id="password" name="password" required />
                            @if ($errors->has('password'))
                                <p class="form-input-hint">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="password-confirm">@lang('form.confirm_password')</label>
                            <input class="form-input" type="password" id="password-confirm" name="password_confirmation" required />
                        </div>
                        
                        <button class="btn btn-primary btn-block mt-20" type="submit">@lang('form.submit')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
