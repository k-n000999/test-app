@section('header')
<div class="header col-sm-10 bg-light">
    @if(Auth::user()->role === 'student')
    <form action="{{ route('student_top') }}" method="GET" class="search-box">
        @csrf
        <div class="input-btn col-sm-4 search-input">
            <input type="text" placeholder="名前or言語検索" name="search" value="{{ request('search') }}">
            <button type="submit" class="fas fa-search search-button"></button>
        </div>
    </form>
    @endif
    @if(Auth::user()->role === 'mentor')
    <form action="{{ route('mentor_top') }}" method="GET" class="search-box">
        @csrf
        <div class="input-btn col-sm-4 search-input">
            <input type="text" placeholder="名前or言語検索" name="search" value="{{ request('search') }}">
            <button type="submit" class="fas fa-search search-button"></button>
        </div>
    </form>
    @endif
</div>
@endsection