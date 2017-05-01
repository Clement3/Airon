@extends('layouts.app')

@section('title', Lang::get('app.your_account_has_been_confirmed'))

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-12">
            <div class="empty">
                <div class="empty-icon">
                    <h3><i class="icon icon-check positive"></i></h3>
                </div>
                <h4 class="empty-title">@lang('app.your_account_has_been_confirmed')</h4>
                <p class="empty-subtitle">@lang('app.confirmed_message')</p>
                @if (Auth::check())
                <div class="empty-action">
                    <a href="#todo" class="btn btn-primary">Créer une annonce</a>
                </div>
                @else
                <div class="empty-action">
                    <a href="{{ route('login') }}" class="btn btn-primary">@lang('app.login')</a>
                </div>                
                @endif
            </div>   
        </div>
    </div>
</div>
@endsection
