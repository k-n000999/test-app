@extends('layout.common')
@section('title', 'ログイン画面 | ESA ACADEMY 生徒管理システム')
@section('register')
<main>
    <div class="login-con">
        <ul class="login-ul">
            <li class="login-li"><a href="{{ route('showRegister') }}"><button type="submit" class="login-page-btn">新規登録</button></a></li>
        </ul>
        <h2 class="form_login-ttl">ログイン</h2>
        <div class="inner_login">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="box_login">
                    <label for="e-mail" class="form_login-font">e-mail</label>
                    <input type="text" class="form_login" id="email" name="email">
                </div>
                <div class="box_login">
                    <label for="password" class="form_login-font">password</label>
                    <input type="text" class="form_login" id="password" name="password">
                </div>
                <div class="form-btn-wrap"><button type="submit" class="form-btn">ログイン</button></div>
            </form>
        </div>
    </div>
</main>
@endsection