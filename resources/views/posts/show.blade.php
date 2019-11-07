@extends('layout.app')


@section('content')
    <h1>Articles</h1>
            <div class="">
                <p>écrit le  {{ $post->created_at }}</p>
                <p>{{ $post->title }}</p>
                <p>{!! $post->body !!}</p>
            </div>
            <div class="row">
                <div class="col s2">
                    <a href="/posts/{{ $post->id }}/edit" class="waves-effect waves-light btn">Editer l'article</a>
                </div>
                <div class="col s2">
            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
            
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Supprimer', ['class' => 'waves-effect waves-light btn red']) !!}
            </div>
            </div>
@stop