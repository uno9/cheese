<?PHP

//session start
session_start();
// var_dump($_SESSION["kanri_flg"]);

//0. 読み込み
include('functions.php');
include('functions_menu.php');

//0.5 ログインチェック
chk_ssid();

// menuの表示
$menu = menu();
$menuKanri = menuKanri();

// 管理フラグが１ならば、menuと管理者用ログインmenuを表示する
if($_SESSION['kanri_flg']==1){
    $menuBar = $menu.$menuKanri.'<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
}else{
    $menuBar = $menu.'<li class="nav-item"><a class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
};

// var_dump($_SESSION['name']);
$name = $_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザーログイン画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <style>
        div{
            padding: 10px;
            font-size:20px;
            }
    </style>
</head>

<body>

    <header>
        <!-- navBar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg_yellow">
            <a class="navbar-brand" href="#"></a>ユーザー登録
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menuBar?>
                </ul>
            </div>

            <!-- ログイン名を表示 -->
            <div>
                <p class="status"><span style="#ffb142;"><?=$name?></span>さんがログインしています</p>
            </div>

        </nav>
    </header>

    <form action="user_insert.php" method="post">
        <div class="form-group">
            <label for="lid">User ID</label>
            <input type="text" class="form-control" id="lid" name="lid" placeholder="大文字または小文字の英数字">
        </div>
        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="lpw">Pass word</label>
            <input type="password" class="form-control" id="lpw" name="lpw" placeholder="大文字または小文字の英数字">
        </div>
        <div class="form-group">
            <label for="kanri_flg">Role</label>
            <input type="radio" class="form-kanri_flg" id="kanri_flg0" name="kanri_flg" value="0" checked=checked><label for="kanri_flg0">一般ユーザー</noframes></label>
            <input type="radio" class="form-kanri_flg" id="kanri_flg1" name="kanri_flg"  value="1"><label for="kanri_flg1">管理者ユーザー</label>

        </div>
        <!-- <div class="form-group">
            <label for="life_flg">Active</label>
            <input type="radio" class="form-life_flg" id="life_flg０" name="life_flg" value="0" checked=checked>アクティブ</noframes></label>
            <input type="radio" class="form-life_flg" id="life_flg１" name="life_flg" value="1">非アクティブ</label>

        </div> -->

        <!-- <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="name">User name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div> -->

            <button type="submit_t"  id="submit" class="btn btn-primary">Submit</button>
        <!-- </div> -->
    </form>
  

</body>

</html>