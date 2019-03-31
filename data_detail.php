<?php

session_start();

include('functions.php');

// ログインチェック
chk_ssid();

// ログイン名のチェック
$name = $_SESSION['name'];


// getで送信されたidを取得
$id = $_GET['id'];

//DB接続します
$pdo = db_conn();

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT * FROM cheese_academy_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    // エラーのとき
    errorMsg($stmt);
} else {
    // エラーでないとき
    $rs = $stmt->fetch();
    // fetch()で1レコードを取得して$rsに入れる
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todo更新ページ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg_yellow">
            <a class="navbar-brand" href="#">商品登録</a>
            <a class="navbar-brand" href="http://localhost//cheese_academy_original/data_get.php">もどる</a>

            <div class="collapse navbar-collapse" id="navbarNav"></div>

            <!-- ログイン名を表示 -->
            <div>
                <p class="status"><span><?=$name?></span>さんがログインしています</p>
            </div>

        </nav>
    </header>

    <form method="post" action="data_update.php">
        <div class="form-group">
            <label for="text">商品一覧</label>
            <!-- 受け取った値をvaluesに埋め込もう -->
            <input type="text" class="form-control" id="text" name="text" value="<?=$rs['text']?>">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする。編集されないように-->
        <input type="hidden" name="id" value="<?=$rs['id']?>">
    </form>

</body>

</html>