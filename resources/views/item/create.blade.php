@extends('layouts.app')

@section('title', 'Déposer une annonce')

@section('content')
<div class="container grid-960">
    <div class="columns">
        <div class="column col-8">
            <div class="panel">
                <div class="panel-header">
                    <div class="panel-title">
                        Déposer une annonce
                    </div> 
                    <div class="panel-body">
                        <ul class="step mt-20">
                            <li class="step-item active">
                                <a href="#" class="tooltip tooltip-bottom" data-tooltip="Votre annonce">Générales</a>
                            </li>
                            <li class="step-item">
                                <a href="#" class="tooltip tooltip-bottom" data-tooltip="L'emplacement de l'annonce">Localisation</a>
                            </li>
                            <li class="step-item">
                                <a href="#" class="tooltip tooltip-bottom" data-tooltip="Photos de l'annonce">Photos</a>
                            </li>
                            <li class="step-item">
                                <a href="#" class="tooltip tooltip-bottom" data-tooltip="Options sur l'annonce">Options</a>
                            </li>                            
                            <li class="step-item">
                                <a href="#" class="tooltip tooltip-bottom" data-tooltip="Confirmation">Valider</a>
                            </li>
                        </ul>
                        <form class="form-horizontal mt-20">

                            <div class="form-group">
                                <div class="col-3">
                                    <label class="form-label" for="input-example-1">Titre</label>
                                </div>
                                <div class="col-9">
                                    <input class="form-input" type="text" id="input-example-1" placeholder="Name" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-3">
                                    <label class="form-label" for="input-example-1">Prix</label>
                                </div>
                                <div class="col-9">
                                    <input class="form-input" type="text" id="input-example-1" placeholder="Name" />
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="col-3">
                                    <label class="form-label" for="input-example-6">Description</label>
                                </div>
                                <div class="col-9">
                                    <textarea class="form-input" id="input-example-6" placeholder="Textarea" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group mt-20">     
                                <div class="col-3">
                                    <a href="#" class="btn">Réinitialiser</a>
                                </div>
                                <div class="col-9">
                                    <button class="btn btn-primary btn-block" type="submit">Étape suivante</button>
                                </div>
                            </div>                     
                        </form>
                    </div>                  
                </div>
            </div>        
        </div>
    </div>
</div>
@endsection