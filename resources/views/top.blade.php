<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESA ACADEMY 生徒管理システム</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Optional JavaScript -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('sidebar')
            <!-- /.col-sm-2 .sidebar -->

            <div class="r-column col-sm-10">
                <div class="header col-sm-10">
                    <button class="input-btn col-sm-4" type="submit">
                        <input type="text" placeholder="TEL検索">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <!-- /.header .col-sm-10 -->

                <main class="student-list">
                    <div class="container-fluid wrapper">
                        <p class="result">15件</p>
                        <section class="container-fluid contents-area">
                            <table class="table">
                                <thead>
                                    <tr>
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

            </div>
            <!-- /.r-column .col-sm-10 -->


        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

</body>

</html>