@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@include('layout.header')
<!-- /.header .col-sm-10 -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>メンター一覧</h1>
        <p class="result">15件</p>
        <section class="container-fluid contents-area">
            <table class="table">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>言語</th>
                        <th>経験年数</th>
                        <th>自己紹介</th>
                        <th>タグ</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mentors as $mentor)
                    <tr>
                        <td>{{ $mentor->name }}</td>
                        <td>{{ $mentor->teaching_languages }}</td>
                        <td>{{ $mentor->experience_years }}</td>
                        <td>{{ $mentor->introduction }}</td>
                        <td>
                            @foreach($mentor->user->tags as $tag)
                            <a href="{{ route('student_top', ['search' =>$tag->name]) }}" class="custom-tag">#{{ $tag->name }}</a>
                            @endforeach
                        </td>
                        <td>
                            <button class="tb-btn tb-btn-edit" onclick="location.href='/reserve/{{ $mentor->id }}'">予約</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- /.container-fluid .contents-area -->
        <nav class="pager">
            <ul class="pagination justify-content-center">
                {{ $mentors->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </nav>
        <!-- /.pager -->
    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection