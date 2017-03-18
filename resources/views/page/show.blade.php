@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page->title }}</div>

                <div class="panel-body">
                    <h3>{{ $page->updated_at }}</h3>
                    <p>{{ $page->content }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
