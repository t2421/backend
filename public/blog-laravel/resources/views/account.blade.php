@extends('layouts.app')

@section('content')
<div class="container">
    @can('system-only')
    <h1>システム管理者のみ表示</h1>
    @elsecan('admin-higher')
    <h2>管理者以上に表示</h2>
    @elsecan('user-higher')
    <h2>すべての人に表示</h2>
    @endcan
</div>
@endsection
