@extends('layouts.app')

@section('title', 'Voir annonce')

@section('content')
<div class="container grid-960">
    <div class="columns">

        <div class="column col-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">@lang('app.home')</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">@lang('items.ads_index')</a>
                </li>                               
                <li class="breadcrumb-item">
                    {{ $item->title }}
                </li>
            </ul>        
        </div>
        
        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        {{ $item->title }}
                        <span class="float-right">
                            {{ $item->price }} €
                        </span>
                    </div> 
                </div>
                <div class="panel-body">
                    <img src="https://picturepan2.github.io/spectre/img/osx-yosemite.jpg" class="img-responsive" alt="Photo">
                </div>
            </div>
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        @lang('items.description')
                    </div>
                </div>
                <div class="panel-body">
                    {{ $item->content }}
                </div>
            </div>           
        </div>

        <div class="column col-4 col-sm-12">
            <div class="panel pb-0">
                <div class="panel-header text-center">
                    <a href="{{ route('profile', ['name' => $item->user->name]) }}">
                        <figure class="avatar avatar-xl" data-initial="{{ $item->user->nameForAvatar() }}" style="background-color: #5764c6;">
                            @if (!empty($item->user->profile->avatar))
                            <img src="{{ Storage::url($item->user->profile->avatar) }}" alt="Avatar">
                            @endif                    
                        </figure>
                    </a>
                    <div class="panel-title mt-10">
                        <a href="{{ route('profile', ['name' => $item->user->name]) }}" class="no-underline">
                            {{ $item->user->name }} 
                        </a>
                    </div>
                    <div class="panel-subtitle">
                        @lang('app.registered_since', ['date' =>  $item->user->created_at->format('j F Y')])
                    </div>
                </div>
                <div class="divider text-center" data-content="@lang('app.ratings')"></div>
                <div class="panel-body mt-10">
                    <div class="tile positive">
                        <div class="tile-content">
                            <p class="tile-title">@lang('app.positives')</p>
                        </div>
                        <div class="tile-action">
                            10
                        </div>
                    </div>
                        <div class="tile neutral">
                        <div class="tile-content">
                            <p class="tile-title">@lang('app.neutrals')</p>
                        </div>
                        <div class="tile-action">
                            0
                        </div>
                    </div>
                    <div class="tile negative">
                        <div class="tile-content">
                            <p class="tile-title">@lang('app.negatives')</p>
                        </div>
                        <div class="tile-action">
                            0
                        </div>
                    </div>                                       
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary btn-block">@lang('app.all_ratings')</button>
                    <button class="btn btn-primary btn-block mt-10">@lang('app.all_ads', ['ads' => 100])</button>
                </div>
            </div>

            <div class="panel mt-20 pb-0">
                <div class="panel-footer">
                    <a href="#" class="btn btn-primary btn-block">@lang('items.contact_seller')</a>
                    <div class="divider"></div>     
                    @if (Auth::check())
                    <favorite :item="{{ $item->id }}" :favorited="{{ $item->favorited() ? 'true' : 'false' }}"></favorite>
                    @endif   
                    <a href="#" class="btn btn-primary btn-block mt-10">@lang('items.share_ad')</a>
                    <a href="#" class="btn btn-primary btn-block mt-10">@lang('items.report_ad')</a>        
                </div>                
            </div>
        </div>

    </div>   
</div>
@endsection
