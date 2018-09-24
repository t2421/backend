@extends('layouts.app')

@section('content')
<div class="container">
   <form action="/blog-laravel/public/articles/create" method="post">
    {{ csrf_field() }}
    <div class="form-group">
            <label for="titleInput">タイトル</label>
            <input type="text" class="form-control" id="titleInput" name="title">
        </div>

        <div class="form-group">
                <label for="bodyInput">本文</label>
                <textarea type="text" class="form-control" id="bodyInput" name="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">新規追加</button>
    </form>
</div>
@endsection
