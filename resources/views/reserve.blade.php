@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1>予約可能時間</h1>
        <p class="result">{{ $mentor->name }}</p>
        <section class="container-fluid contents-area">
            <table class="table">
                <!-- メッセージ表示領域 -->
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <tbody>
                    @if ($time_slots->count() > 0)
                    <ul>
                        @foreach ($time_slots as $time_slot)
                        <tr>
                            <td>{{ $time_slot->start_time }} ～ {{ $time_slot->end_time }}</td>
                            <form action="{{ route('reserve', [$time_slot->id]) }}" method="POST">
                                @csrf
                                <td><button class="tb-btn tb-btn-edit" onclick="location.href='/reserve/{{ $mentor->id }}'">予約</button></td>
                            </form>
                        </tr>
                        @endforeach
                    </ul>
                    @else
                    <p>予約情報はありません。</p>
                    @endif
                </tbody>
            </table>
        </section>
    </div>
</main>
@endsection