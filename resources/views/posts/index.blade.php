@extends('layout.app')


@section('content')
    <h1>Articles</h1>
    <hr>
    <a class="waves-effect waves-light btn green" href="/posts/create">Nouvel article</a>
    @if (count($posts) >= 1)
        
        @foreach ($posts as $post)
            <div class="">
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <p>écrit le  {{ $post->created_at }}</p>
                <p>{{ $post->body }}</p>
            </div>
            <hr>
            <p><a href="/posts/{{ $post->id }}"> Lire la suite...</a></p>
        @endforeach
        
        
    @else
        <p>Aucun article existant</p>
    @endif
    {{ $posts->links() }}
@stop
