<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheese Academy 経路</title>

    <link rel="stylesheet" href="../cheese_academy_original/css/cheese_map.css">


    <style>
        .dirInstructions td,
        .dirInstructions th {
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .dirSDK p {
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }
    </style>


</head>

<body>
     <a href="http://localhost//cheese_academy_original/cheese.php">もどる</a>

    <h1>あなたの現在地からCheese Academyまで</h1>

    <div class="now_position">
        <h2>あなたの現在経緯度</h2>
        <div id="output"></div>
        <div id="output2"></div>

        <h4><span style="color:#ffda79;font-weight: bold">※ルートを知りたい方は、現在位置を許可にしてください※</span></h4>

    </div>

    <div id="directionsItinerary"></div>
    <div id="map" style="position:relative;width:100%;height:400px;">
        <p>Now Loading...</p>

    </div>



    <script src='../cheese_academy_original/jquery-3.3.1.min .js'></script>
    <script
        src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key= yourKey'
        async defer>
        </script>

    <script>

        // 現在地を取得する
        const set = {
            // ＜オプション＞
            // より高精度な位置を求める
            enableHighAccuracy: true,
            // 最後の現在地情報取得が20秒以内であれば、その情報を再利用する設定
            maximumAge: 20000,
            // 10秒以内に現在地情報を取得できなければ、処理を終了
            timeout: 10000
        }


        // 現在地の取得に成功した時の関数
        // mapslnitで取得した現在地をpositionの中に入れる
        function mapslnit(position) {
            // 緯度
            const lat = position.coords.latitude;
            // 経度
            const lng = position.coords.longitude;
            console.log(lat, lng);

            // outputに緯度、経度をそれぞれ表示
            $("#output").html("緯度：" + lat);
            $("#output2").html("経度：" + lng);

            // mapに地図表示
            // lat, lng = 取得した現在地を入れる→中心として表示
            // map = new Microsoft.Maps.Map('#map', {
            //     center: {
            //         latitude: lat,
            //         longitude: lng
            //     },
            //     // loadしたときにbingMapを読み込み表示する
            //     mapTypeId: Microsoft.Maps.MapTypeId.load,
            //     zoom: 16
            // });

            map = new Microsoft.Maps.Map('#map', {});
            //Load the directions moduleの実行
            Microsoft.Maps.loadModule('Microsoft.Maps.Directions', function () {
                //ルートの作成→mapに反映させる
                directionsManager = new Microsoft.Maps.Directions.DirectionsManager(map);
                //どこからどこまでのルートか指定する
                // 現在地 (startWaypoint) → Cheese Academy (cheeseWaypoint)  までのルートを指定(location内)
                var startWaypoint = new Microsoft.Maps.Directions.Waypoint({ location: new Microsoft.Maps.Location(lat, lng) });
                directionsManager.addWaypoint(startWaypoint);

                var cheeseWaypoint = new Microsoft.Maps.Directions.Waypoint({ location: new Microsoft.Maps.Location(33.586571, 130.394491) });
                directionsManager.addWaypoint(cheeseWaypoint);

                //ルート化する要素をセットする
                directionsManager.setRenderOptions({ itineraryContainer: '#directionsItinerary' });
                //ルートの計算
                directionsManager.calculateDirections();
            });



            // // map上にfuction pushpin()の実行
            // pushpin(lat, lng, map);

        }

        function mapsError(error) {
            // mapsErrorで取得したエラー内容をerrorの中に入れる
            let e = '';
            if (error.code == 1) {
                // error.code==1:PERMISSION_DENIED
                e = '位置情報が許可されていません';
            }
            else if (error.code == 2) {
                // error.code==2:POSITION_UNAVAILABLE
                e = '位置情報を特定できません';
            }
            else if (error.code == 3) {
                // error.code==3:TIMEOUT
                e = '位置情報を取得する前にタイムアウトになりました';
            }
            alert('error:' + e);
        }

        // 位置情報を取得する処理
        // 成功するとmapslnit()を実行、失敗するとmapserror()を実行
        function GetMap() {
            // コールバック関数(
            // success:positionオブジェクトのみ受け取る =  mapslnit,
            // error:任意で指定。postionErrorのみ受け取る  =  mapsError,
            // [options]:任意で指定。positionOptionsのオブジェクト  =  set)

            navigator.geolocation.getCurrentPosition(mapslnit, mapsError, set);

        }

        // pushPinの表示
        // pushpin(緯度,経度,現在の)
        // function pushpin(lat, lng, now) {
        //     // locationに緯度と経度を入れる
        //     let location = new Microsoft.Maps.Location(lat, lng)
        //     // location内のデータを使って指定した色のpinをおく
        //     let pin = new Microsoft.Maps.Pushpin(location, {
        //         color: '#706fd3',
        //         //display,visible：表示する →違いは、非表示時に"領域を確保するかしないか"
        //         disvisible: true
        //     });
        //     //pinを表示させる
        //     now.entities.push(pin);
        // };



    </script>


</body>

</html>