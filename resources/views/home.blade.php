@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-12">
            <div class="empty">
                <div class="empty-icon">
                    <i class="icon icon-people"></i>
                </div>
                <h4 class="empty-title">You have no new messages</h4>
                <p class="empty-subtitle">Click the button to start a conversation.</p>
                <div class="empty-action">
                    <button class="btn btn-primary">Send a message</button>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
