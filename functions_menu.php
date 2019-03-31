<?php
//navのmenuを作成

//管理者外のログインmenu
function menu() {
    $menu = '<li class="nav-item"><a class="nav-link" href="data_get.php">Cheese一覧</a></li>';
    return $menu;
}

// function menuNon() //ログインしていないユーザー用
// {
//     $menuNon = '<li class="nav-item"><a class="nav-link" href="bm_login.php">ログインページ</a></li>';
//     $menuNon .= '<li class="nav-item"><a class="nav-link" href="select_nologin.php">お気に入り一覧</a></li>';
//     return $menuNon;
// }

// 管理者用ログインmenu
function menuKanri(){
    $menuKanri = '<li class="nav-item"><a class="nav-link" href="cheese_index.php">商品登録</a></li>';
    $menuKanri .= '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザー登録</a></li>';
    $menuKanri .= '<li class="nav-item"><a class="nav-link" href="user_select.php">ユーザー管理</a></li>';

    return $menuKanri;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <script src="../cheese_academy_original/jquery-3.3.1.min .js"></script>
    <!--ナビバー動かすためのソース-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>


</body>

</html>