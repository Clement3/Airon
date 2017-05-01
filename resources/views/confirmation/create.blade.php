@extends('layouts.app')

@section('title', Lang::get('app.confirmation_send_successfully'))

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-12">
            <div class="empty">
                <div class="empty-icon">
                    <h3><i class="icon icon-mail positive"></i></h3>
                </div>
                <h4 class="empty-title">@lang('app.confirmation_send_successfully')</h4>
                <p class="empty-subtitle">@lang('app.check_your_mail')</p>
                <div class="empty-action">
                    <a href="#todo" class="btn btn-primary">@lang('app.home')</a>
                </div>                
            </div>   
        </div>
    </div>
</div>
@endsection
