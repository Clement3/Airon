@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editer une page</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ action('Admin\PageController@update', ['id' => $page->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Titre</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $page->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">Contenu</label>

                            <div class="col-md-6">
                                <textarea id="content" class="form-control" name="content" rows="3">{{ $page->content }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('menu_id') ? ' has-error' : '' }}">
                            <label for="menu_id" class="col-md-4 control-label">ID du menu</label>

                            <div class="col-md-6">
                                <input id="menu_id" type="text" class="form-control" name="menu_id" value="{{ $page->menu_id }}">

                                @if ($errors->has('menu_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('menu_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Editer la page
                                </button>

                                <a class="btn btn-link" href="{{ action('Admin\PageController@index') }}">
                                    Toutes les pages
                                </a>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
