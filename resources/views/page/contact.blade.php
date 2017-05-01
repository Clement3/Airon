@extends('layouts.app')

@section('title', Lang::get('app.contact_us'))

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
                    @lang('app.contact_us')
                </li>
            </ul>        
        </div>
        
        <div class="column col-4 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">Notre adresse</div>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.contact_us')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('PageController@postContact') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="fullname">@lang('form.fullname')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('fullname') ? ' is-danger' : '' }}" type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required />
                                @if ($errors->has('fullname'))
                                    <p class="form-input-hint">{{ $errors->first('fullname') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="email">@lang('form.email')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('email') ? ' is-danger' : '' }}" type="text" id="email" name="email" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                    <p class="form-input-hint">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="reason">Reason</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input{{ $errors->has('reason') ? ' is-danger' : '' }}" type="text" id="reason" name="reason" value="{{ old('reason') }}" required />
                                @if ($errors->has('reason'))
                                    <p class="form-input-hint">{{ $errors->first('reason') }}</p>
                                @endif                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="message">Message</label>
                            </div>
                            <div class="col-9">
                                <textarea class="form-input{{ $errors->has('message') ? ' is-danger' : '' }}" id="message" name="message" rows="3" value="{{ old('message') }}" required /></textarea>
                                @if ($errors->has('message'))
                                    <p class="form-input-hint">{{ $errors->first('message') }}</p>
                                @endif                                   
                            </div>
                        </div> 

                        <button class="btn btn-primary btn-block mt-20" type="submit">@lang('form.send')</button>  
                                               
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection