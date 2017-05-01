@extends('layouts.app')

@section('title', Lang::get('app.settings'))

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
                    @lang('app.settings')
                </li>
            </ul>        
        </div>

        @include('user.menu')

        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.settings')</div>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{ action('UserController@postSettings') }}">
                        {{ csrf_field() }}

                        <div class="columns">

                            <avatar-preview 
                                image-src="{{ Auth::user()->profile->avatarFile() }}" 
                                avatar-name="{{ Auth::user()->nameForAvatar() }}" 
                                lang-label="@lang('form.avatar')"
                                lang-delete="@lang('app.delete')"
                                destroy-link="{{ Auth::user()->profile->canDestroyAvatar() }}"
                            ></avatar-preview>

                            <div class="column col-6 col-sm-12">
                                <label class="form-label" for="firstname">@lang('form.firstname')</label>
                                <input class="form-input{{ $errors->has('firstname') ? ' is-danger' : '' }}" type="text" id="firstname" name="firstname" value="{{ Auth::user()->profile->firstname }}" />
                                @if ($errors->has('firstname'))
                                    <p class="form-input-hint">{{ $errors->first('firstname') }}</p>
                                @endif                                      
                            </div>                                                                                                                        

                            <div class="column col-6 col-sm-12">
                                <label class="form-label" for="lastname">@lang('form.lastname')</label>
                                <input class="form-input{{ $errors->has('lastname') ? ' is-danger' : '' }}" type="text" id="lastname" name="lastname" value="{{ Auth::user()->profile->lastname }}" />
                                @if ($errors->has('lastname'))
                                    <p class="form-input-hint">{{ $errors->first('lastname') }}</p>
                                @endif                          
                            </div>

                            <div class="column col-12 col-sm-12">
                                <label class="form-label" for="birthdate">@lang('form.birthdate')</label>
                                <input class="form-input{{ $errors->has('birthdate') ? ' is-danger' : '' }}" type="date" id="birthdate" name="birthdate" value="{{ Auth::user()->profile->birthdate }}" />
                                @if ($errors->has('birthdate'))
                                    <p class="form-input-hint">{{ $errors->first('birthdate') }}</p>
                                @endif                                 
                            </div>

                            <div class="column col-6 col-sm-12">

                            </div>
                        </div>

                        <button class="btn btn-primary btn-block" type="submit">@lang('form.submit')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
