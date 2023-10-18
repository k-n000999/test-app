@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>予約状況</h1>
        <ul class="nav nav-pills mb">
            <li class="nav-item">
                <a href="#contents1" class="nav-link {{ $timeSlot->status === 'booked' ? 'active' : '' }}" data-toggle="tab">予約済み</a>
            </li>
            <li class="nav-item">
                <a href="#contents2" class="nav-link  {{ $timeSlot->status === 'available' ? 'active' : '' }}" data-toggle="tab">申請中</a>
            </li>
        </ul>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <section class="container-fluid contents-area">
            <div class="tab-content">
                @if ($timeSlot->reservation)
                <div id="contents1" class="tab-pane {{ $timeSlot->status === 'booked' ? 'active' : '' }}">
                    @if ($timeSlot->status === 'booked')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>学習中の言語</th>
                                <th>経験レベル</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $timeSlot->reservation->student->name }}</td>
                                <td>{{ $timeSlot->reservation->student->learning_language }}</td>
                                <td>{{ $timeSlot->reservation->student->experience_level }}</td>
                                <td><button class="tb-btn tb-btn-del" data-toggle="modal" data-target="#exampleModal{{ $timeSlot->id }}">取消</button></td>
                                <!-- Modal -->
                                <div class="modal" id="exampleModal{{ $timeSlot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">取り消しますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary tb-btn" data-dismiss="modal">中止</button>
                                                <form action="{{ route('mentor_delete', [$timeSlot->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary tb-btn tb-btn-del">取消</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>

                        </tbody>
                    </table>
                    @endif
                </div>
                <div id="contents2" class="tab-pane  {{ $timeSlot->status === 'available' ? 'active' : '' }}">
                    @if ($timeSlot->status === 'available')
                    <table class="table">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>学習中の言語</th>
                                <th>経験レベル</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $timeSlot->reservation->student->name }}</td>
                                <td>{{ $timeSlot->reservation->student->learning_language }}</td>
                                <td>{{ $timeSlot->reservation->student->experience_level }}</td>
                                <form action="{{ route('mentor_approve', [$timeSlot->id]) }}" method="POST">
                                    @csrf
                                    <td><button class="tb-btn tb-btn-edit" onclick="location.href='/mentor/Reservationlist/{{ $timeSlot->id }}'">承認</button></td>
                                </form>
                                <td><button class="tb-btn tb-btn-del" data-toggle="modal" data-target="#exampleModal{{ $timeSlot->id }}">拒否</button></td>
                                <!-- Modal -->
                                <div class="modal" id="exampleModal{{ $timeSlot->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">拒否しますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary tb-btn" data-dismiss="modal">中止</button>
                                                <form action="{{ route('mentor_delete', [$timeSlot->id]) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary tb-btn tb-btn-del">拒否</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
                @else
                <p>予約情報はありません。</p>
                @endif
            </div>
        </section>
    </div>
</main>
@endsection