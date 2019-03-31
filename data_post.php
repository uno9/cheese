<?php


include('functions.php');

// 入力チェック
if (
    !isset($_POST['text']) || $_POST['text']=='' 
) {
    exit('ParamError');
}

//POSTデータ取得
$text = $_POST['text'];

// Fileアップロードチェック
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] ==0) {
    // ファイルをアップロードしたときの処理
    
    // ①送信ファイルの情報取得
    $file_name = $_FILES['upfile']['name']; //ファイル名
    $tmp_path = $_FILES['upfile']['tmp_name']; //tmpフォルダ(拡張子を取ってくる)
    $file_dir_path = 'uploads/'; //アップロード先


    // ②File名の準備
    //PATHINFO_EXTENSION->ファイルパスに関する情報を返す=file_nameを表示
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);

    // YmdHis:時間を32 文字の 16 進数からなるハッシュで返し、file_nameとくっつけて表示
    $uniq_name = date('YmdHis').md5(session_id()) . "." . $extension;
    $file_name = $file_dir_path.$uniq_name; //file_nameに保存先のファイル名をくっつける事で保存先URLを作る

    // ③サーバの保存領域に移動&④表示
    $img='';
    if (is_uploaded_file($tmp_path)) {
        if (move_uploaded_file($tmp_path, $file_name)) {
            //chmod:ファイルのモードを変更する　644:パーミッション o:4読み＋２書き許可　g.a:4のみ許可
            chmod($file_name, 0644);
    } else {
     exit('Error:アップロードできませんでした．');
    }
 }
    
//一時保管場所のこと
} else {
    // ファイルをアップしていないときの処理
    $img = '画像が送信されていません';
}



// DB接続
$pdo = db_conn();

// データ登録SQL作成
// imageカラムとバインド変数を追加
$sql ='INSERT INTO cheese_academy_table(id, text, image, indate)
VALUES(NULL, :a1, :a2,sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $text, PDO::PARAM_STR);
$stmt->bindValue(':a2', $file_name, PDO::PARAM_STR);
 
// :imageを$file_nameで追加！
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //index.phpへリダイレクト
    header('Location: cheese_index.php');
}
