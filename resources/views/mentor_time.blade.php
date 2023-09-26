@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <h1 class="text-right">時間登録</h1>
        <form action="{{ route('mentor_timeslot') }}" method="POST" class="d-flex flex-column w-50 m-auto">
            @csrf
            <input type="hidden" name="mentor_id" value="{{ $mentor->id }}">
            <label for="start_time">開始時間:</label>
            <input type="datetime-local" name="start_time" id="start_time">

            <label for="end_time" class="fw-bold mt-5">終了時間:</label>
            <input type="datetime-local" name="end_time" id="end_time">

            <button type="submit" class="w-25 mt-5">登録する</button>
        </form>
    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection