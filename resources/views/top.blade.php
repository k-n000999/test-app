@extends('layout.common')
@section('title', 'ESA ACADEMY 生徒管理システム')
@include('layout.sidebar')
<!-- /.col-sm-2 .sidebar -->
@include('layout.header')
<!-- /.header .col-sm-10 -->
@section('content')
<main class="student-list">
    <div class="container-fluid wrapper">
        <p class="result">15件</p>
        <section class="container-fluid contents-area">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名前</th>
                        <th>年齢</th>
                        <th>生年月日</th>
                        <th>e-mail</th>
                        <th>TEL</th>
                        <th>プラン名</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $students)
                    <tr>
                        <td>{{ $students->id }}</td>
                        <td>{{ $students->name }}</td>
                        <td>{{ $students->age }}</td>
                        <td>{{ $students->birthday }}</td>
                        <td>{{ $students->email }}</td>
                        <td>{{ $students->tel }}</td>
                        <td>{{ $students->plan }}</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>鈴木 健司</td>
                        <td>20</td>
                        <td>2001/9/21</td>
                        <td>suzuken@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>山田 可奈子</td>
                        <td>22</td>
                        <td>1999/12/6</td>
                        <td>kanako-1206@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>松田 隆</td>
                        <td>19</td>
                        <td>2002/1/10</td>
                        <td>matsusda-matsu@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>STANDARD</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>山田 秀幸</td>
                        <td>20</td>
                        <td>2001/9/21</td>
                        <td>hide-0001@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>森 直子</td>
                        <td>22</td>
                        <td>1999/12/6</td>
                        <td>naoko-mori@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>高岡 正和</td>
                        <td>19</td>
                        <td>2002/1/10</td>
                        <td>mskz0110@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>STANDARD</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>坂本 優</td>
                        <td>20</td>
                        <td>2001/9/21</td>
                        <td>suguru@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>大島 美香子</td>
                        <td>22</td>
                        <td>1999/12/6</td>
                        <td>mikako01234@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>山本 志帆</td>
                        <td>19</td>
                        <td>2002/1/10</td>
                        <td>yamashiho2002@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>STANDARD</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                    <tr>
                        <td>丸山 宏二</td>
                        <td>20</td>
                        <td>2001/9/21</td>
                        <td>koji0921@ggmail.com</td>
                        <td>080-1234-5678</td>
                        <td>PREMIUM</td>
                        <td>
                            <button class="tb-btn tb-btn-edit">編集</button>
                            <button class="tb-btn tb-btn-del">削除</button>
                        </td>
                    </tr>
                </tbody>
            </table>

        </section>
        <!-- /.container-fluid .contents-area -->

        <nav class="pager">
            <ul class="pagination justify-content-center">
                <li class="page-item active">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item">
                    <a class="pager-next" href="#"><i class="fas fa-angle-right"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.pager -->

    </div>
    <!-- /.container-fluid .wrapper-->

</main>
@endsection