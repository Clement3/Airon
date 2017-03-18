@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des pages</div>

                <div class="panel-body">
                    @if ($pages->isEmpty())
                    <p>Vous n'avez pas encore créer de page, <a href="">Créer une nouvelle page</a></p>
                    @else
                    <table class="table table-striped">
                        <thead> 
                            <tr> 
                                <th># ID</th> 
                                <th>Titre</th> 
                                <th>Créer le</th> 
                                <th>Action</th> 
                            </tr> 
                        </thead>
                        <tbody> 
                            @foreach ($pages as $page)
                            <tr> 
                                <th scope="row">{{ $page->id }}</th> 
                                <td>{{ $page->title }}</td> 
                                <td>{{ $page->created_at }}</td> 
                                <td>
                                    <a href="{{ action('PageController@show', ['slug' => $page->slug]) }}">Voir</a> -
                                    <a href="{{ action('Admin\PageController@edit', ['id' => $page->id]) }}">Editer</a> - 
                                    <a href="{{ action('Admin\PageController@destroy', ['id' => $page->id]) }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('destroy-form').submit();">
                                        Supprimer
                                    </a>

                                    <form id="destroy-form" action="{{ action('Admin\PageController@destroy', ['id' => $page->id]) }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>                                    
                                </td> 
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>  
                    @endif              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
