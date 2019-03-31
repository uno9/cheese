<?php

// DB接続
function db_conn(){
    // mysqlに接続するためのログイン
    $dbname= 'gs_f02_db04';
    $db='mysql:dbname='.$dbname.';charset=utf8;port=3306;host=localhost';
    $user='root';
    $pwd='';

    // オブジェクトの新規作成
    try{
        return new PDO($db,$user,$pwd);

        // 何かPDOにErrorがあるなら、exitして表示してね（デバック処理）
    }catch(PDOException $e){
        exit('dbError:'.$e->getMessage());
    }
}

// $stmtにerrorがあるなら、2行目(詳しく)を表示して
function errorMsg($stmt){
    $error=$stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}


function chk_ssid(){
    // 送信する側と受け取る側にchk_ssidが無ければ、
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !=session_id()){
        // ログイン失敗
        header('Location:login.php');

    }else{
        // あればログイン成功
        session_regenerate_id(true);
        $_SESSION['chk_ssid']=session_id();
    }
}

