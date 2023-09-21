@extends('layout.common')
@section('title', '新規登録画面 | ESA ACADEMY 生徒管理システム')
@section('register')
<main>
    <div class="login-con">
        <ul class="login-ul">
            <li class="login-li"><a href="{{ url('/login') }}"><button type="submit" class="login-page-btn">ログイン</button></a></li>
        </ul>
        <h2 class="form_login-ttl">新規登録</h2>
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
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="box_login">
                    <label for="name" class="form_login-font">名前</label>
                    <input type="text" class="form_login" id="name" name="name">
                </div>
                <div class="box_login">
                    <label for="e-mail" class="form_login-font">e-mail</label>
                    <input type="text" class="form_login" id="email" name="email">
                </div>
                <div class="box_login">
                    <label for="password" class="form_login-font">password</label>
                    <input type="text" class="form_login" id="password" name="password">
                </div>
                <div class="box_login">
                    <label class="form_login-font">role</label>
                    <select name="role" class="pulldown">
                        <option value="">▼ 以下から選択</option>
                        <option value="student">student</option>
                        <option value="mentor">mentor</option>
                    </select>
                </div>
                <div id="studentForm" style="display: none;">
                    <div class="box_login">
                        <label for="learning_language" class="form_login-font">学習中のプログラミング言語</label>
                        <input type="text" class="form_login" id="learning_language" name="learning_language">
                    </div>
                    <div class="box_login">
                        <label class="form_login-font">経験レベル</label>
                        <select name="experience_level" class="pulldown">
                            <option value="">▼ 以下から選択</option>
                            <option value="beginner">beginner</option>
                            <option value="intermediate">intermediate</option>
                            <option value="advanced">advanced</option>
                        </select>
                    </div>
                </div>
                <div id="mentorForm" style="display: none;">
                    <div class="box_login">
                        <label for="teaching_languages" class="form_login-font">指導可能なプログラミング言語</label>
                        <input type="text" class="form_login" id="teaching_languages" name="teaching_languages">
                    </div>
                    <div class="box_login">
                        <label for="experience_years" class="form_login-font">経験年数</label>
                        <input type="text" class="form_login" id="experience_years" name="experience_years">
                    </div>
                    <div class="box_login">
                        <label for="introduction" class="form_login-font">自己紹介</label>
                        <input type="text" class="form_login" id="introduction" name="introduction">
                    </div>
                </div>
                <div class="form-btn-wrap"><button type="submit" class="form-btn">新規登録</button></div>
            </form>
        </div>
    </div>
</main>
@endsection