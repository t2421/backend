@extends('layouts.app')

@section('content')
<div class="container">
    @can('system-only')
    <h1>システム管理者のみ表示</h1>
    @endcan;
    @can('admin-higher')
    <h2>管理者以上に表示</h2>
    @endcan;
    @can('user-higher')
    <h2>すべての人に表示</h2>
    @endcan
</div>
@endsection
