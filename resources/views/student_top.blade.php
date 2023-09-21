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
                            <button class="tb-btn tb-btn-edit" onclick="location.href='/reserve/{{ $mentor->id }}'">予約</button>

                            <!-- Modal -->
                            <div class="modal" id="exampleModal{{ $mentor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">削除しますか？</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary tb-btn" data-dismiss="modal">中止</button>
                                            <form action="{{ route('delete', [$mentor->id]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary tb-btn tb-btn-del">削除</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
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