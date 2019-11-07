
@extends('layout.app')

@section('content')

    <h1>Création d'articles</h1>


@include('errors')
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'class' => 'col s12']) !!}
<div class="row">
    <div class="input-field col s6">
        <i class="material-icons prefix">account_circle</i>
        {!! Form::text('title', '', ['class' => 'validate']) !!}
        {!! Form::label('title', 'Titre') !!}
    </div>
</div>
<div class="row">
    <div class="input-field col s6">
        <i class="material-icons prefix">mode_edit</i>
        {!! Form::textarea('body', '', ['class' => 'materialize-textarea']) !!}
        {!! Form::label('body', 'Contenu') !!}
    </div>
</div>
    {!! Form::submit('création de l\'article', ['class' => 'waves-effect waves-light btn']) !!}
</div>
{!! Form::close() !!}
@stop

