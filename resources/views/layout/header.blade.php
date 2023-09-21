@section('header')
<div class="header col-sm-10">
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <button class="input-btn col-sm-4" type="button">
            <input type="text" placeholder="TEL検索" name="search">
            <button type="submit"><i class="fas fa-search"></i></button>
        </button>
</div>
</form>
@endsection