@extends('layouts.app')

@section('title', Lang::get('app.create_address'))

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
                    <a href="{{ action('LocationController@index') }}">
                    @lang('app.my_addresses')
                    </a>
                </li>                            
                <li class="breadcrumb-item">
                    @lang('app.create_address')
                </li>
            </ul>        
        </div>    

        @include('user.menu')

        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        @lang('app.create_address')
                        <a href="{{ action('LocationController@index') }}" class="float-right"><small>@lang('app.my_addresses')</small></a>
                    </div>                   
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ action('LocationController@store') }}">
                        {{ csrf_field() }}

                        <div class="columns">
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">@lang('form.address_name')</label>
                                    <input class="form-input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" required />
                                    @if ($errors->has('name'))
                                        <p class="form-input-hint">{{ $errors->first('name') }}</p>
                                    @endif  
                                </div>                            
                            </div>
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="fullname">@lang('form.fullname')</label>
                                    <input class="form-input{{ $errors->has('fullname') ? ' is-danger' : '' }}" type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required />
                                    @if ($errors->has('fullname'))
                                        <p class="form-input-hint">{{ $errors->first('fullname') }}</p>
                                    @endif
                                </div>                            
                            </div>  
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="address">@lang('form.address')</label>
                                    <input class="form-input{{ $errors->has('address') ? ' is-danger' : '' }}" type="text" id="address" name="address" value="{{ old('address') }}" required />
                                    @if ($errors->has('address'))
                                        <p class="form-input-hint">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>                                  
                            </div> 
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="address_more">@lang('form.address_more')</label>
                                    <input class="form-input{{ $errors->has('address_more') ? ' is-danger' : '' }}" type="text" id="address_more" name="address_more" value="{{ old('address_more') }}" />
                                    @if ($errors->has('address_more'))
                                        <p class="form-input-hint">{{ $errors->first('address_more') }}</p>
                                    @endif
                                </div>                               
                            </div>
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="city">@lang('form.city')</label>
                                    <input class="form-input{{ $errors->has('city') ? ' is-danger' : '' }}" type="text" id="city" name="city" value="{{ old('city') }}" required />
                                    @if ($errors->has('city'))
                                        <p class="form-input-hint">{{ $errors->first('city') }}</p>
                                    @endif
                                </div>                            
                            </div>   
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="state">@lang('form.state')</label>
                                    <input class="form-input{{ $errors->has('state') ? ' is-danger' : '' }}" type="text" id="state" name="state" value="{{ old('state') }}" />
                                    @if ($errors->has('state'))
                                        <p class="form-input-hint">{{ $errors->first('state') }}</p>
                                    @endif
                                </div>                            
                            </div>
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="zipcode">@lang('form.zipcode')</label>
                                    <input class="form-input{{ $errors->has('zipcode') ? ' is-danger' : '' }}" type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" required />
                                    @if ($errors->has('zipcode'))
                                        <p class="form-input-hint">{{ $errors->first('zipcode') }}</p>
                                    @endif
                                </div>                            
                            </div>
                            <div class="column col-6 col-sm-12">
                                <div class="form-group">
                                    <label class="form-label" for="phone">@lang('form.phone')</label>
                                    <input class="form-input{{ $errors->has('phone') ? ' is-danger' : '' }}" type="text" id="phone" name="phone" value="{{ old('phone') }}" required />
                                    @if ($errors->has('phone'))
                                        <p class="form-input-hint">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>                            
                            </div>                                                                               
                        </div> 

                        <div class="form-group mt-20">
                            <label class="form-switch">
                                <input type="checkbox" name="main" />
                                <i class="form-icon"></i> @lang('app.main_checkbox')
                            </label>
                        </div>

                        <button class="btn btn-primary btn-block mt-20" type="submit">@lang('form.create_address')</button>  
                    </form>     
                </div>        
            </div>
        </div>
    </div>
</div>
@endsection
