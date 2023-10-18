@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>予約状況</h1>
        <p class="result">15件</p>
        <ul class="nav nav-pills mb">
            <li class="nav-item">
                <a href="#contents1" class="nav-link active" data-toggle="tab">予約済み</a>
            </li>
            <li class="nav-item">
                <a href="#contents2" class="nav-link" data-toggle="tab">申請中</a>
            </li>
        </ul>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <section class="container-fluid contents-area">
            <div class="tab-content">
                @if ($reservations->count() > 0)
                <div id="contents1" class="tab-pane active">
                    @if ($status->contains('booked'))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>氏名</th>
                                <th>開始時間</th>
                                <th>終了時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            @if ($reservation->timeSlot->status === 'booked')
                            <tr>
                                <td>{{ $reservation->timeSlot->mentor->name }}</td>
                                <td>{{ $reservation->timeSlot->start_time }}</td>
                                <td>{{ $reservation->timeSlot->end_time }}</td>
                                <td class="d-none">{{ $reservation->timeSlot->id }}</td>
                                <td><button class="tb-btn tb-btn-del w-75" data-toggle="modal" data-target="#exampleModal{{ $reservation->timeSlot->id }}">キャンセル</button></td>
                                <!-- Modal -->
                                <div class="modal" id="exampleModal{{ $reservation->timeSlot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">キャンセルしますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary tb-btn" data-dismiss="modal">中止</button>
                                                <form action="{{ route('student_delete', $reservation->timeSlot->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary tb-btn tb-btn-del  w-25">キャンセル</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div id="contents2" class="tab-pane">
                    @if ($status->contains('available'))
                    <table class="table">
                        <thead>
                            <tr>
                                <th>氏名</th>
                                <th>開始時間</th>
                                <th>終了時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            @if ($reservation->timeSlot->status === 'available')
                            <tr>
                                <td>{{ $reservation->timeSlot->mentor->name }}</td>
                                <td>{{ $reservation->timeSlot->start_time }}</td>
                                <td>{{ $reservation->timeSlot->end_time }}</td>
                                <td class="d-none">{{ $reservation->timeSlot->id }}</td>
                                <td><button class="tb-btn tb-btn-del w-75" data-toggle="modal" data-target="#exampleModal{{ $reservation->timeSlot->id }}">キャンセル</button></td>
                                <!-- Modal -->
                                <div class="modal" id="exampleModal{{ $reservation->timeSlot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">キャンセルしますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary tb-btn" data-dismiss="modal">中止</button>
                                                <form action="{{ route('student_delete', $reservation->timeSlot->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary tb-btn tb-btn-del  w-25">キャンセル</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                @else
                <p>予約情報はありません。</p>
                @endif
            </div>
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