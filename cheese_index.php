<?php

session_start();

include('functions.php');
include('functions_menu.php');

// ログインチェック
chk_ssid();

// ログイン名のチェック
$name = $_SESSION['name'];

// manuBar
$menu = menu();
$menuKanri = menuKanri();

// 管理者フラグの分岐menu
if($_SESSION['kanri_flg']==1){
    $menuBar = $menu.$menuKanri.'<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
}else{
    $menuBar = '<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <!-- navBar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg_yellow">
            <a class="navbar-brand" href="#">商品登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menuBar?>
                </ul>
            </div>

            <!-- ログイン名を表示 -->
            <div>
                <p class="status"><span><?=$name?></span>さんがログインしています</p>
            </div>

        </nav>

    </header>

    <main>
    <form method="post" action="data_post.php" enctype="multipart/form-data">

        <div class="form-group">
            <label for="text">商品名</label>
            <input type="text" class="form-control" id="text" name="text" >
        </div>
        <div class="form-group">
            <label for="upfile">商品画像</label>
            <!-- inputを追加 -->
            <!-- accept:受けとるファイル種別を指定する　image/*:画像だけを受け入れる -->
            <input type="file" class="form-control-file" id="upfile" name="upfile" accept="image/*" capture="camera">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


    </main>

</body>

</html>