@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des utilisateurs</div>

                <div class="panel-body">
                    @if ($users->isEmpty())
                    <p>Il n'y à aucun utilisateurs.</p>
                    @else
                    <table class="table table-striped">
                        <thead> 
                            <tr> 
                                <th># ID</th> 
                                <th>Pseudo</th> 
                                <th>E-mail</th>
                                <th>Créer le</th>
                                <th>Action</th> 
                            </tr> 
                        </thead>
                        <tbody> 
                            @foreach ($users as $user)
                            <tr> 
                                <th scope="row">{{ $user->id }}</th> 
                                <td>{{ $user->name }}</td> 
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="">Voir</a> -
                                    <a href="">Editer</a> - 
                                    <a href="">Supprimer</a>                                  
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
