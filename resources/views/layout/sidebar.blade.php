@section('sidebar')
<div class="col-sm-2 sidebar">
    <h1 class="logo"><a href="{{ url('/') }}"><img src="./img/logo.png" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>
    <nav>
        <ul>
            <li><a href="{{ url('/sign_up') }}" class="sign-up-btn"><i class="fas fa-plus"></i>新規登録画面</a></li>
            <li><a href="{{ url('/') }}" class="top-page-btn"><i class="fas fa-home"></i>トップページ</a></li>
        </ul>
    </nav>
</div>
@endsection