<?php

session_start();

include('functions.php');
include('functions_menu.php');

// ログインチェック
chk_ssid();

// ログイン名のチェック
$name = $_SESSION['name'];
$k_flg=$_SESSION['kanri_flg'];

//DB接続
$pdo = db_conn();


// manuBar
$menu = menu();
$menuKanri = menuKanri();

// 管理者フラグの分岐menu
if($_SESSION['kanri_flg']==1){
    $menuBar = $menu.$menuKanri.'<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
}else{
    $menuBar = '<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
};


//データ表示SQL作成
$sql = 'SELECT * FROM cheese_academy_table ORDER BY text ASC';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示


if($k_flg==1){

        $view='';
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<li class="list-group-item">';
            $view .= '<p>'.$result['text'].'</p>';
            $view .= '<img src="'.$result['image'].'" alt="" height="150px">';        // imgタグで出力しよう！
            $view .= '<div><a href="data_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
            $view .= '<a href="data_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a></div>';
            $view .= '</li>';    
        }
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $view='';
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $view .= '<li class="list-group-item">';
            $view .= '<p>'.$result['text'].'</p>';
            $view .= '<img src="'.$result['image'].'" alt="" height="150px">';        // imgタグで出力しよう！
            $view .= '</li>';    
        }
     }
  }



    // if ($status==false) {
    //     errorMsg($stmt);
    // } else {
    //     $view='';
    //     while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //         $view .= '<li class="list-group-item">';
    //         $view .= '<p>'.$result['text'].'</p>';
    //         $view .= '<img src="'.$result['image'].'" alt="" height="150px">';        // imgタグで出力しよう！
    //         // $view .= '<div><a href="data_detail.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
    //         // $view .= '<a href="data_delete.php?id='.$result['id'].'" class="badge badge-danger">Delete</a></div>';
    //         $view .= '</li>';
    //     }
    // }



?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoリスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
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

    <div>
        <ul class="list-group">
            <?=$view?>
        </ul>
    </div>

</body>

</html>