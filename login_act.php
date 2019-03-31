<?php

session_start();

include('functions.php');

// DB接続、データ受け取り
$pdo=db_conn();

// postしたデータを入れる場所指定(変数で)
$lid=$_POST['lid'];
$lpw=$_POST['lpw'];

// データを入れるDBを指定
$sql = 'SELECT * FROM cheese_academy_user WHERE lid=:lid AND lpw=:lpw AND life_flg=0';//０＝アクティブ
$stmt = $pdo->prepare($sql);//実行準備
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);//lidデータを返す
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);//lpwデータを返す
$res = $stmt->execute();//実行

// SQL実行時にerrorがあるとき
if ($res==false) {
    queryError($stmt);
}

// 全ての行(レコード)データを取り出す
$val=$stmt->fetch();

//該当レコードがあればSESSIONに値を代入
if ($val['id'] != '') {
    // ログイン成功の場合はセッション変数に値を代入
   $_SESSION=array();
   $_SESSION['chk_ssid']= session_id();
   $_SESSION['kanri_flg']= $val['kanri_flg'];
   $_SESSION['name'] = $val['name'];
    header('Location:data_get.php');
} else {
    //ログイン失敗の場合はログイン画面へ戻る
    header('Location:login.php');
}

exit();

