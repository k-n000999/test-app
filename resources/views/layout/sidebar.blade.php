@section('sidebar')
<div class="col-sm-2 sidebar">
    <h1 class="logo"><a href="{{ Auth::user()->role === 'student' ? route('student_top') : route('mentor_top') }}"><img src="{{ asset('img/logo.png')}}" alt="ESA ACADEMY 生徒管理システム" class="img-fluid"></a></h1>
    <nav>
        <ul>
            @if(Auth::user()->role === 'mentor')
            <li class="side-li-mb"><a href="{{ url('mentor/time') }}" class="sign-up-btn"><i class="fas fa-plus"></i>時間登録</a></li>
            <li class="side-li-mb"><a href="{{ Auth::user()->role === 'student' ? route('student_top') : route('mentor_top') }}" class="top-page-btn"></i>生徒</a></li>
            <li class="side-li-mb"><a href="{{ url('/mentor/Timelist') }}" class="top-page-btn">予約情報</a></li>
            @endif
            @if(Auth::user()->role === 'student')
            <li class="side-li-mb"><a href="{{ Auth::user()->role === 'student' ? route('student_top') : route('mentor_top') }}" class="top-page-btn"></i>メンター</a></li>
            <li class="side-li-mb"><a href="{{ url('/status/{id}') }}" class="top-page-btn">予約状況</a></li>
            @endif
        </ul>
    </nav>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout-btn">ログアウト</button>
    </form>
</div>
@endsection