<?php
// 関数ファイル読み込み
include('functions.php');


//入力チェック(受信確認処理追加)
if (
    !isset($_POST['lid'])||$_POST['lid']==''||
    !isset($_POST['name'])||$_POST['name']==''||
    !isset($_POST['lpw'])||$_POST['lpw']==''

) {
    exit('ParamError');
}

//POSTデータ取得
$lid=$_POST['lid'];
$name=$_POST['name'];
$lpw=$_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
$life_flg=$_POST['life_flg'];

$id= $_POST['id'];




//DB接続します(エラー処理追加)
$pdo=db_conn();

//データ登録SQL作成
$sql = 'UPDATE cheese_academy_user SET lid=:a1,name=:a2,lpw=:a3,kanri_flg=:a4,life_flg=:a5 WHERE id=:id'; //,comment=:a3
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a2', $name, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();



//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location:user_select.php'); //header関数でselect.phpに戻る
    exit;
}
