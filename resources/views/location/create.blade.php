@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-8">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        @lang('app.create_address')
                        <a href="{{ action('LocationController@index') }}" class="float-right"><small>@lang('app.my_addresses')</small></a>
                    </div>                   
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('LocationController@store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="name">Name</label>
                            </div>
                            <div class="col-5">
                                <input class="form-input{{ $errors->has('name') ? ' is-danger' : '' }}" type="text" id="name" name="name" value="{{ old('name') }}" required autofocus />
                                @if ($errors->has('name'))
                                    <p class="form-input-hint">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="col-4">
                                <label class="form-checkbox float-right">
                                    <input type="checkbox" name="main" />
                                    <i class="form-icon"></i> @lang('app.main')
                                </label>    
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="fullname">Full Name</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('fullname') ? ' is-danger' : '' }}" type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required autofocus />
                                @if ($errors->has('fullname'))
                                    <p class="form-input-hint">{{ $errors->first('fullname') }}</p>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="street">Street</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('street') ? ' is-danger' : '' }}" type="text" id="street" name="street" value="{{ old('street') }}" required autofocus />
                                @if ($errors->has('street'))
                                    <p class="form-input-hint">{{ $errors->first('street') }}</p>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-3">
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('street_more') ? ' is-danger' : '' }}" type="text" id="street_more" name="street_more" value="{{ old('street_more') }}" />
                                @if ($errors->has('street_more'))
                                    <p class="form-input-hint">{{ $errors->first('street_more') }}</p>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="city">City</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('city') ? ' is-danger' : '' }}" type="text" id="city" name="city" value="{{ old('city') }}" required autofocus />
                                @if ($errors->has('city'))
                                    <p class="form-input-hint">{{ $errors->first('city') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="state">State</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('state') ? ' is-danger' : '' }}" type="text" id="state" name="state" value="{{ old('state') }}" />
                                @if ($errors->has('state'))
                                    <p class="form-input-hint">{{ $errors->first('state') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="zipcode">Zip code</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('zipcode') ? ' is-danger' : '' }}" type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" required autofocus />
                                @if ($errors->has('zipcode'))
                                    <p class="form-input-hint">{{ $errors->first('zipcode') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="phone">Phone</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('phone') ? ' is-danger' : '' }}" type="text" id="phone" name="phone" value="{{ old('phone') }}" required autofocus />
                                @if ($errors->has('phone'))
                                    <p class="form-input-hint">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                        </div>    

                        <button class="btn btn-primary btn-block" type="submit">Créer l'adresse</button>  
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
