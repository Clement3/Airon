@extends('layouts.app')

@section('title', Lang::get('app.profile_of', ['name' => $user->name]))

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
                    @lang('app.profile_of', ['name' => $user->name])
                </li>
            </ul>        
        </div>

        <div class="column col-4 col-sm-12">
            <div class="panel pb-0">
                <div class="panel-header text-center">
                    <figure class="avatar avatar-xl" data-initial="{{ $user->nameForAvatar() }}" style="background-color: #5764c6;">
                        @if (!empty($user->profile->avatar))
                        <img src="{{ Storage::url($user->profile->avatar) }}" alt="Avatar">
                        @endif                    
                    </figure>
                    <div class="panel-title mt-10">{{ $user->name }}</div>
                    <div class="panel-subtitle">@lang('app.registered_since', ['date' =>  $user->created_at->format('j F Y')])</div>
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
                    @if (Auth::check())
                            <div class="divider"></div>
                        @if (Auth::user()->id == $user->id)
                            <a href="{{ action('UserController@getSettings') }}" class="btn btn-primary btn-block">@lang('app.settings')</a>
                        @else
                            <a href="{{ action('UserController@getSettings') }}" class="btn btn-primary btn-block">Report user</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <div class="column col-8 col-sm-12">
            <div class="btn-group btn-group-block">
                <button class="btn active">Ventes <samp>10</samp></button>
                <button class="btn">Échanges <samp>0</samp></button>
                <button class="btn">Locations <samp>0</samp></button>
            </div>
           <div class="columns mt-10"> 
                <div class="column col-4 col-sm-12">
                    <form>
                        <input class="form-input input-sm" type="text" placeholder="Rechercher par titre">
                    </form>
                </div>
                <div class="column col-8 col-sm-12">
                    <select class="form-select select-sm float-right">
                        <option value="" disabled="">Trier par</option>
                        <option>Slack</option>
                        <option>Skype</option>
                        <option>Hipchat</option>
                    </select>
              </select>                    
                </div>
           </div>
            <div class="empty mt-10">
                <h4 class="empty-title">{{ $user->name }} n'a aucune vente.</h4>
                <p class="empty-subtitle">Click the button to start a conversation.</p>
            </div>              
        </div>        
    </div>
</div>
@endsection
