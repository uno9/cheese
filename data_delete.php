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

//1. GETデータ取得
$id   = $_GET['id'];


//3．データ登録SQL作成
$sql = 'DELETE FROM cheese_academy_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header('Location: data_get.php');
    exit;
}
