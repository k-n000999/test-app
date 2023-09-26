@section('header')
<div class="header col-sm-10 bg-light">
    <form action="{{ route('search') }}" method="POST" class="search-box">
        @csrf
        <div class="input-btn col-sm-4 search-input">
            <input type="text" placeholder="名前or言語検索" name="search">
            <button type="submit" class="fas fa-search search-button"></button>
        </div>
    </form>
</div>
@endsection