
@extends('layout.app')

@section('content')

    <h1>Création d'articles</h1>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'class' => 'col s12']) !!}
<div class="row">
    <div class="input-field col s12">
        {!! Form::label('title', 'Titre') !!}
        
        {!! Form::text('title', $post->title , ['class' => 'validate']) !!}
    </div>
    <div class="input-field col s12">
        {!! Form::label('body', 'Contenu') !!}
            
        {!! Form::textarea('body', $post->body , ['class' => 'validate']) !!}
    </div>
    
    {!! Form::hidden('_method', 'PUT') !!}
    
    {!! Form::submit('Modifier l\'article', ['class' => 'waves-effect waves-light btn']) !!}
</div>
{!! Form::close() !!}
@stop