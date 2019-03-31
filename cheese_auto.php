<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheese Academy Infomation</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../cheese_academy_original/css/cheese_auto.css">

</head>

<body>
    <header class="chat_header">
        <a href="http://localhost//cheese_academy_original/cheese.php">もどる</a>

        <h1 class="title">Cheese Academy Infomation</h1>
    </header>


    <main>
        <div class="chat_box">
            <!-- <div class="name_box">
                <div>name
                    <input type="text" id="name">
                </div>
                <button id="save">save</button>
                <button id="clear">clear</button>
            </div>     -->


            <div class="user_comment">
                <h3 class="user_title">お問い合わせ内容</h3>
                <textarea name="" id="comment" cols="50" rows="5"></textarea>
                <button id="send">send</button>
                <button id="clear">clear</button>

            </div>

            <div id="output"></div>
        </div>


    </main>

    <script src="jquery-3.3.1.min .js"></script>

    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: yourKey,
            authDomain: yourKey,
            databaseURL:  yourKey,
            projectId: yourKey,
            storageBucket: "",
            messagingSenderId:  yourKey,
        };
        firebase.initializeApp(config);

        var newPostRef = firebase.database().ref();

        // 日時を取得する関数
        function ymd() {
            var date = new Date();
            return date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
        }

        // Localstorageで保存する

        // コメントクリア
        $('#clear').on('click', function () {
            localStorage.removeItem('comment');
            $('#comment').val('');
        });


        // 送信ボタン実行
        $('#send').on('click', function () {

            function clear() {
                $('#comment').val('');
            }

            var text1 = $('#comment').val();
            if (text1.match(/時間/)) {
                var text2 = '●時～〇時です';

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: text2
                });
                clear();

            } else if (text1.match(/どこ/)) {
                var text2 = "福岡県福岡市中央区大名１丁目３−４１ G's ACADEMY FUKUOKA エンジニア起業家養成学校";

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: text2
                });
                clear();

            } else if (text1.match(/購入方法/)) {
                var text2 = ' 実店舗とネットがあります';

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: text2
                });
                clear();

            } else if (text1.match(/電話/)) {
                var text2 = '000-000-0000';

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: text2
                });
                clear();

            } else if (text1.match(/支払い/)) {
                var text2 = ' 現金　、クレジットカード　、その他は電話にて相談ください。';

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: text2
                });
                clear();

            } else {
                const auto = ["♡チーーーーズ♡", "こんにちは", "Hello！Cheeseer", "直接電話ください", "ハイジ", "オンジーー", "ユキチャン！"]
                var text2 = Math.floor(Math.random() * (auto.length));

                newPostRef.push({
                    time: ymd(),
                    text01: $('#comment').val(),
                    text02: auto[text2]
                });
                clear();

            }

        });


        // メッセージが追加されたら表示する
        newPostRef.on('child_added', function (data) {
            var k = data.key;
            var v = data.val();

            // console.log(k);
            console.log(v);
            console.log(v.text01);
            console.log(v.text02);


            // divを作ってOUTPUTに表示→idはfire baseのkey。
            // ユーザー名と時間、コメント内容がそれぞれ表示される
            var str1 = '';
            str1 += '<div class=user_content>';
            str1 += '<div class="user_text" id="' + k + '">';
            str1 += '<p class="name">Customer</p>';
            str1 += '<p class="time">' + v.time + '</p>';
            str1 += '<p class="text">' + v.text01 + '</p>';
            str1 += '</div>'
            str1 += '<img id="myIcon" class="myIcon" src="../cheese_academy_original/img/myIcon.png" alt="">';
            str1 += '</div>'

            var str2 = "";
            str2 += '<div class = master_content>';
            str2 += '<img id="master_Icon" class="master_Icon" src="../cheese_academy_original/img/masterCheeseer.png" alt="">';
            str2 += '<div class="muster_text" id="master_comment">';
            str2 += '<p id="name_kos" class="name">Master Cheeser</p>';
            str2 += '<p class="time">' + v.time + '</p>';
            str2 += '<p class="text">' + v.text02 + '</p>';
            str2 += '</div>'
            str2 += '</div>'

            // 表示
            $("#output").prepend(str1);
            $("#output").prepend(str2);
        });

        //prepend : 前に追加する
        //append  : 後に追加する →LINE、facebook等

        // Master Cheeserのメッセージのみ青背景
        var master_name = "master"
        console.log(master_name);

        if (master_name == "Master Cheeser") {
            $("#kos_mess").css({ "background-color": "blue" });
        }

    </script>


</body>

</html>