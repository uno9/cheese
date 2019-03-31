<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>ログイン</title>

    <style>
        .Unregistered{
            margin:5%;
        }
        
    </style>
</head>
<body>
    
    <header>
        <h1>ログイン画面</h1>
        <a class="navbar-brand"  href="http://localhost//cheese_academy_original/cheese.php">もどる</a>
    </header>


    <main class="user_input">
        <!-- login_act.phpにpost -->
        <form method="post" action="login_act.php">
            <div class="form-group">
                <label for="lid">LoginID</label>
                <input type="text" class="form-control" id="lid" name="lid">
            </div>

            <div class="form-group">
                <label for="lpw">LoginPASS</label>
                <input type="password" class="form-control" id="lpw" name="lpw">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>

    <div>
        <div class="Unregistered">
            <h4>ユーザー登録をしていない方</h4>
        </div>
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
                
                <button type="submit"  id="submit_t" class="btn btn-primary">Submit</button>
                
            </form>
    </div>

    </main>
    
</body>
</html>