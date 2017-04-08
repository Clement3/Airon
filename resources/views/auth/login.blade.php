@extends('layouts.app')

@section('content')
<div class="container grid-480">
    <div class="columns">
        <div class="column col-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Login</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="email">E-mail</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" id="email" name="email" value="{{ old('email') }}" required autofocus />
                                @if ($errors->has('email'))
                                    <p class="form-input-hint">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('password') ? ' is-danger' : '' }}" type="password" id="password" name="password" value="{{ old('password') }}" required autofocus />
                                @if ($errors->has('password'))
                                    <p class="form-input-hint">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <label class="form-checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <i class="form-icon"></i> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
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
