@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.settings')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="firstname">Firstname</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Name" value="{{ Auth::user()->profile->firstname }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="lastname">Lastname</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Name" value="{{ Auth::user()->profile->lastname }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="birthdate">Birth date</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="date" id="birthdate" name="birthdate">
                            </div>
                        </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary btn-block">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="column col-4 col-sm-12">
            @include('user.menu')        
        </div>
    </div>
</div>
@endsection
