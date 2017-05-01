@extends('layouts.app')

@section('title', Lang::get('app.my_addresses'))

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
                    @lang('app.my_addresses')
                </li>
            </ul>        
        </div>

        @include('user.menu')   
         
        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        @lang('app.my_addresses')
                        <a href="{{ action('LocationController@create') }}" class="float-right"><small>@lang('app.create_address')</small></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="columns">
                        @if (collect($locations)->isEmpty())
                        <div class="column col-12">
                            <div class="empty">
                                <h4 class="empty-title">@lang('app.empty_addresses')</h4>
                                <p class="empty-subtitle">@lang('app.click_empty_addresses')</p>
                                <div class="empty-action">
                                    <a href="{{ action('LocationController@create') }}" class="btn btn-primary">@lang('app.create_address')</a>
                                </div>
                            </div>
                        </div>                        
                        @endif                    
                        @foreach ($locations as $location)
                        <div class="column col-6 col-sm-12">
                            <div class="address">
                                <div class="address-heading">
                                    {{ $location->name }}
                                    @if ($location->main) 
                                        <span class="label label-primary float-right">@lang('app.main')</span>
                                    @endif
                                </div>
                                <div class="address-body">
                                    <ul>
                                        <li><strong>{{ $location->fullname }}</strong></li>
                                        <li>{{ $location->address }}</li>
                                        <li>{{ $location->address_more }}</li>
                                        <li>{{ $location->city }}, {{ $location->zipcode }}</li>
                                        <li>{{ $location->country }}</li>
                                        <li>{{ $location->phone }}</li>
                                    </ul>                                
                                </div>
                                <div class="address-footer">
                                    <a href="{{ action('LocationController@edit', ['id' => $location->id]) }}" class="btn btn-primary btn-sm">@lang('app.edit')</a>
                                    <a href="{{ action('LocationController@destroy', ['id' => $location->id]) }}" 
                                        class="btn btn-primary btn-sm"
                                        onclick="event.preventDefault();
                                                    document.getElementById('destroy-form').submit();">
                                        @lang('app.delete')
                                    </a>

                                    <form id="destroy-form" action="{{ action('LocationController@destroy', ['id' => $location->id]) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>  

                                    @if (!$location->main) 
                                    <a href="{{ action('LocationController@setMain', ['id' => $location->id]) }}" class="btn btn-primary btn-sm float-right">@lang('app.main')</a> 
                                    @endif                                    
                                </div>
                            </div>
                        </div>
                        @endforeach                                                                                          
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
