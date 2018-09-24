@extends('layouts.app')

@section('content')
<div class="container">
    <p><a href="/blog-laravel/public/articles/create" class="btn btn-primary">新規追加</a></p>
    @foreach ($articles as $article)
        <div class="card mb-2">
        <a href="/blog-laravel/public/articles/edit/{{$article->id}}">
            <div class="card-body">
            <h4 class="card-title">{{$article->title}}</h4>
            <h6 class="card-subtitle mb-2 text-muted">{{$article->updated_at}}</h6>
            <p class="card-text">{{$article->body}}</p>
            </div>
        </a>
        </div>
    @endforeach
</div>
@endsection
