<?php

session_start();

// SESSIONに入れた配列をすべて破棄する
$_SESSION=array();

// Cookie内のSESSION_ID削除
//SESSIONも破棄
if(isset($_COOKIE[session_name()])){
    //time()-4200:1970 1/1からの経過年数(4200秒)
    setcookie(session_name(),'',time()-42000,'/');
}

// サーバー側でSESSIONの破棄
session_destroy();

// Login画面にリダイレクト
header('Location:login.php');
exit();