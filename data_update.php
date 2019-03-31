<?php
include('functions.php');

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['text']) || $_POST['text']=='' 
) {
    exit('ParamError');
}

//POSTデータ取得
$id     = $_POST['id'];
$text   = $_POST['text'];

//DB接続します(エラー処理追加)
$pdo = db_conn();

//データ登録SQL作成
$sql = 'UPDATE cheese_academy_table SET text=:a1  WHERE id=:id';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $text, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: data_get.php');
    exit;
}
