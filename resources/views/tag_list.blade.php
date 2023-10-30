@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@include('layout.header')
<!-- /.header .col-sm-10 -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>タグ一覧</h1>
        <p class="result">15件</p>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <section class="container-fluid contents-area">
            <table class="table">
                <thead>
                    <tr>
                        <th>タグ名</th>
                        <th>登録数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tagsWithCount as $tag)
                    <tr>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->users_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- /.container-fluid .contents-area -->
        <nav class="pager">
            <ul class="pagination justify-content-center">
                {{ $tagsWithCount->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </nav>
        <!-- /.pager -->

    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection