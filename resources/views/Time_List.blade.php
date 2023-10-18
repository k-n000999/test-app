@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>予約情報</h1>
        <p class="result">5件</p>
        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <section class="container-fluid contents-area">
            <table class="table">
                <thead>
                    <tr>
                        <th>開始時間</th>
                        <th>終了時間</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeSlots as $timeSlot)
                    <tr>
                        <td>{{ $timeSlot->start_time }}</td>
                        <td>{{ $timeSlot->end_time }}</td>
                        <td class="d-none">{{ $timeSlot->id }}</td>
                        <td>
                            <button class="tb-btn tb-btn-edit w-50" onclick="location.href='{{ route('mentor_reservationList', ['id' => $timeSlot->id]) }}'">予約状況</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        <!-- /.container-fluid .contents-area -->
        <nav class="pager">
            <ul class="pagination justify-content-center">
                {{ $timeSlots->links('vendor.pagination.bootstrap-4') }}
                </li>
            </ul>
        </nav>
        <!-- /.pager -->

    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection