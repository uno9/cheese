<?php

include('functions.php');
// 入力チェック
if(
    !isset($_POST['lid'])||$_POST['lid']==''||
    !isset($_POST['name'])||$_POST['name']==''||
    !isset($_POST['lpw'])||$_POST['lpw']==''
    
){


    exit('未入力の部分があります。入力してください👍');

}


//POSTデータ取得

$lid=$_POST['lid'];
$name=$_POST['name'];
$lpw=$_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
// $life_flg=$_POST['life_flg'];

// $comment=$_POST['comment'];
    // exit($name);

$pdo=db_conn();


//データ登録SQL作成
$sql ='INSERT INTO cheese_academy_user(id,lid,name,lpw,kanri_flg,indate)VALUES(NULL,:a1,:a2,:a3,:a4,sysdate())';//life_flg,a5

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $lid, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $name, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a5', $life_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)



$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    // 入力に失敗しなかった時
    //５．index.phpへリダイレクト
    header('Location: user_index.php');
}
