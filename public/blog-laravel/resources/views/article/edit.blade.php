@extends('layouts.app')

@section('content')
<div class="container">
   <form action="/blog-laravel/public/articles/edit" method="post">
    {{ csrf_field() }}
   <input type="hidden" name="id" value="{{$article->id}}">
    <div class="form-group">
            <label for="titleInput">タイトル</label>
    <input type="text" class="form-control" id="titleInput" name="title" value="{{$article->title}}">
        </div>

        <div class="form-group">
                <label for="bodyInput">本文</label>
                <textarea type="text" class="form-control" id="bodyInput" name="body">{{$article->body}}</textarea>
            </div>
        <a href="/blog-laravel/public/articles/delete/{{$article->id}}">削除</a>
            <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection
