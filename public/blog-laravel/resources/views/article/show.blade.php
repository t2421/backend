@extends('layouts.app')

@section('content')
<div class="container">
   <form action="/blog-laravel/public/articles/delete" method="post">
    {{ csrf_field() }}
   <input type="hidden" name="id" value="{{$article->id}}">
    <div class="form-group">
            <label for="titleInput">タイトル</label>
    <input type="text" class="form-control" id="titleInput" name="title" readonly value="{{$article->title}}">
        </div>

        <div class="form-group">
                <label for="bodyInput">本文</label>
                <textarea type="text" class="form-control" id="bodyInput" name="body" readonly>{{$article->body}}</textarea>
            </div>
       
            <button type="submit" class="btn btn-primary">削除</button>
    </form>
</div>
@endsection
