@extends('layouts.app')

@section('title', Lang::get('app.reset_password'))

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

                        <button class="btn btn-primary btn-block" type="submit">@lang('app.send_password_reset_link')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
