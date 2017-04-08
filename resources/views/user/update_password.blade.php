@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">

        @include('user.menu')

        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.update_password')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@postUpdatePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="old_password">@lang('app.form.old_password')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('old_password') ? ' is-danger' : '' }}" type="password" id="old_password" name="old_password" required />
                                @if ($errors->has('old_password'))
                                    <p class="form-input-hint">{{ $errors->first('old_password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password">@lang('app.form.new_password')</label>
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
                        
                        <button class="btn btn-primary btn-block mt-20" type="submit">@lang('app.form.submit')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
