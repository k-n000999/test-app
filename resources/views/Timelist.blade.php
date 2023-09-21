@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>予約情報</h1>
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
                        <th>ID</th>
                        <th>開始時間</th>
                        <th>終了時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeSlots as $timeSlots)
                    <tr>
                        <td>{{ $timeSlots->id }}</td>
                        <td>{{ $timeSlots->start_time }}</td>
                        <td>{{ $timeSlots->end_time }}</td>
                        <td>
                            <button class="tb-btn tb-btn-edit w-50" onclick="location.href='{{ route('mentor_Reservationlist', ['id' => $timeSlots->id]) }}'">予約状況</button>
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