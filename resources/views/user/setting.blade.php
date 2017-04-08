@extends('layouts.app')

@section('content')
<div class="container grid-960">
    <div class="columns">
    
        @include('user.menu')

        <div class="column col-8 col-sm-12">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">@lang('app.settings')</div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="firstname">@lang('app.form.firstname')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="text" id="firstname" name="firstname" value="{{ Auth::user()->profile->firstname }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="lastname">@lang('app.form.lastname')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="text" id="lastname" name="lastname" value="{{ Auth::user()->profile->lastname }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-3">
                                <label class="form-label" for="birthdate">@lang('app.form.birthdate')</label>
                            </div>
                            <div class="col-9">
                                <input class="form-input" type="date" id="birthdate" name="birthdate">
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block mt-20" type="submit">@lang('app.form.submit')</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
