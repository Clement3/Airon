@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-8">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.update_password')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@postUpdatePassword') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="old_password">Old password</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('old_password') ? ' is-danger' : '' }}" type="password" id="old_password" name="old_password" placeholder="Old password" required />
                                @if ($errors->has('old_password'))
                                    <p class="form-input-hint">{{ $errors->first('old_password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password">Current password</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" id="password" name="password" placeholder="Current password" required />
                                @if ($errors->has('password'))
                                    <p class="form-input-hint">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password_confirmation">Confirm password</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required />
                                @if ($errors->has('password_confirmation'))
                                    <p class="form-input-hint">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                        </div>
                        
                        <button class="btn btn-primary btn-block" type="submit">Sauvegarder</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="column col-4">
            @include('user.menu')        
        </div>
    </div>
</div>
@endsection
