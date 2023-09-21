@extends('layout.common')
@section('title', '新規登録画面 | ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
<!-- /.header .col-sm-10 -->
@section('content')
<main class="sign-up">
    <div class="container-fluid wrapper">
        <section class="container-fluid contents-area">
            @if(isset( $students ))
            <h2>編集画面</h2>
            @else
            <h2>新規登録画面</h2>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ isset($students) ? route('update') : route('create') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($students) ? $students->id : '' }}">
                <div class="form-inner">
                    <div class="row">
                        <div class="form-group col-sm-5">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" placeholder="阿部 隆" name="name" value="{{ isset($students) ? $students->name : '' }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="age">年齢</label>
                            <input type="text" class="form-control" id="age" placeholder="21" name="age" value="{{ isset($students) ? $students->age : '' }}">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="birthday">生年月日</label>
                            <input type="text" class="form-control" id="birthday" placeholder="2000/6/21" name="birthday" value="{{ isset($students) ? $students->birthday : '' }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="email">e-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="abe-takashi0622@email.com" name="email" value="{{ isset($students) ? $students->email : '' }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="tel">TEL</label>
                            <input type="tel" class="form-control" id="tel" placeholder="080-1234-5678" name="tel" value="{{ isset($students) ? $students->tel : '' }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="plan">プラン名</label>
                            <select class="form-control" id="plan" name="plan">
                                <option></option>
                                <option {{ isset($students) && $students->plan === 'PREMIUM' ? 'selected' : '' }}>PREMIUM</option>
                                <option {{ isset($students) && $students->plan === 'STANDARD' ? 'selected' : '' }}>STANDARD</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.form-inner -->
                @if(isset( $students ))
                <div class="form-btn-wrap"><button type="submit" class="form-btn"><i class="fas fa-plus"></i>更新</button></div>
                @else
                <div class="form-btn-wrap"><button type="submit" class="form-btn"><i class="fas fa-plus"></i>新規登録</button></div>
                @endif
            </form>
        </section>
        <!-- /.container-fluid .contents-area -->
    </div>
    <!-- /.container-fluid .wrapper-->
</main>
@endsection