@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@include('layout.header')
<!-- /.header .col-sm-10 -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>生徒一覧</h1>
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
                        <th>名前</th>
                        <th>学習中の言語</th>
                        <th>経験レベル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->learning_language }}</td>
                        <td>{{ $student->experience_level }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- /.container-fluid .contents-area -->
        <nav class="pager">
            <ul class="pagination justify-content-center">
                <li class="page-item active">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="pager-next" href="#"><i class="fas fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.pager -->

    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection