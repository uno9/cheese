<?php

// 関数ファイルの読み込み

include('functions.php');

//GETデータ取得
$id=$_GET['id'];

//POSTデータ取得

// $comment=$_POST['comment'];
    // exit($name);

$pdo=db_conn();


//データ登録SQL作成
$sql='DELETE FROM user_table WHERE id=:id';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status=$stmt->execute();

//データ登録処理後
if ($status==false){
    errorMsg($stmt);
}else{
    //select.phpへリダイレクト
    header('Location: user_select.php');
    exit;
}