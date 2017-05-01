@extends('layouts.app')

@section('title', Lang::get('app.update_email'))

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
                    @lang('app.update_email')
                </li>
            </ul>        
        </div>

        @include('user.menu')    
        
        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.update_email')</div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ action('UserController@postUpdateEmail') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="form-label" for="password">@lang('form.current_password')</label>
                            <input class="form-input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" id="password" name="password" required />
                            @if ($errors->has('password'))
                                <p class="form-input-hint">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">@lang('form.new_email')</label>
                            <input class="form-input{{ $errors->has('email') ? ' is-danger' : '' }}" type="email" id="email" name="email" required />
                            @if ($errors->has('email'))
                                <p class="form-input-hint">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit">@lang('form.submit')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
