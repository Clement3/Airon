@extends('layouts.app')

@section('title', $page->title)

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
                    {{ $page->title }}
                </li>
            </ul>        
        </div>

        @if ($page->menu_id != null)
        <div class="column col-4 col-sm-12">
            <ul class="menu">
                @if ($page->menu_id == 1)
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'privacy']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'privacy']) ? 'active' : '' }}">@lang('pages.privacy')</a>
                </li>
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'terms']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'terms']) ? 'active' : '' }}">@lang('pages.terms_of_use')</a>
                </li>
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'legal']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'legal']) ? 'active' : '' }}">@lang('pages.legal_notice')</a>
                </li>                
                @elseif ($page->menu_id == 2)           
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'how-to-sell']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'how-to-sell']) ? 'active' : '' }}">@lang('pages.how_to_sell')</a>
                </li>
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'how-to-buy']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'how-to-buy']) ? 'active' : '' }}">@lang('pages.how_to_buy')</a>
                </li>
                <li class="menu-item">
                    <a href="{{ action('PageController@show', ['slug' => 'ratings']) }}" class="{{ Request::fullUrl() == action('PageController@show', ['slug' => 'ratings']) ? 'active' : '' }}">@lang('pages.ratings')</a>
                </li>                   
                @endif
            </ul>
        </div>
        @endif
        
        <div class="column {{ $page->menu_id == null ? 'col-12' : 'col-8' }} col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        {{ $page->title }}
                        <span class="float-right"><small>@lang('pages.updated_on', ['date' =>  $page->updated_at->format('j F Y')])</small></span>
                    </div> 
                </div>
                <div class="panel-body">
                    <p>
                        {{ $page->content }}
                    </p>
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection
