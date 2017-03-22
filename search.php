<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta name="Keywords" content="浜松,イベント,音楽,ライブ" />
        <meta name="description" content="浜松のライブ情報をひとまとめにしました．" />
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96035290-1', 'auto');
  ga('send', 'pageview');

</script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!-- material design lite -->
        <link rel="stylesheet" href="css/material.min.css">
        <script src="js/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">
        <!--<script src="js/scripts.js"></script>-->
        <script src="js/search.js"></script>
        <meta charset="utf-8">
        <title>Live Information Platform in Hamamatsu</title>
    </head>
<body  style="background-color: #E0E0E0;">
    <header id="target">
        <div class="logo">
            <a href="index.php"><img src="img/lip.png" width="50" height="50" alt="ロゴ" /></a>
        </div>
        <div class="inner_form">
            <form id="searchform" action="search.php" method="POST">
                <input type="search" value="" name="search_value" id="search_text" onkeydown="search();">
                <input type="submit" id="submit">
            </form>
            <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
        </div>
    </header>
    <div class="main">
<?php
$query =  $_POST["search_value"];
// echo $query;

require_once'dsn.php';
global $connect;
$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );
mysql_query( "set names utf8");
mysql_select_db(DB,$connect)
or die('Could not select database.');

$sql = "SELECT * FROM event 
WHERE event_name LIKE '%{$query}%' OR
artist_name LIKE '%{$query}%' OR
venue_name LIKE '%{$query}%' OR
venue_address LIKE '%{$query}%'
ORDER BY date ASC";
$result = mysql_query($sql, $connect);
//  var_dump($result);
if(!$result){
    die( mysql_error());
}
$string = $result;
while($value = mysql_fetch_array($result)){
    $kekka[] = $value;
}

foreach($kekka as $value){
		// echo "0:" . $value[0] . "<br>";
		// echo "1:" . $value[1] . "<br>";
		// echo "2:" . $value[2] . "<br>";
		// echo "3:" . $value[3] . "<br>";
		// echo "4:" . $value[4] . "<br>";
		// echo "5:" . $value[5] . "<br>";
		// echo "6:" . $value[6] . "<br>";
		// echo "7:" . $value[7] . "<br>";
		// echo "<br><br>";
    if($value[0]=="null"){
        $id = "";
    }else{
        $id = $value[0];
    }
    if($value[1]=="null"){
        $date = "";
    }else{
        $date = date("n/j", strtotime($value[1]));
    }
    if($value[2]=="null"){
        $time = "";
    }else{
        $time = date("G:i",strtotime($value[2]));
    }
    if($value[3]=="null"){
        $event_name = "";
    }else{
        $event_name = $value[3];
    }
    if($value[4]=="null"){
        $artist_name = "";
    }else{
        $artist_name = $value[4];
    }
    if($value[5]=="null"){
        $venue_name = "";
    }else{
        $venue_name = $value[5];
    }
    if($value[6]=="null"){
        $venue_add = "";
    }else{
        $venue_add = $value[6];
    }
    if($value[7]=="null"){
        $event_url = "";
    }else{
        $event_url = $value[7];
    }

    echo<<<AAA
    <div class="item_card">
    <div class="demo-card-wide mdl-card mdl-shadow--4dpx">
           <div class="mdl-card__title">$date</div>
            <div class="event_list">
                <ul class="demo-list-icon mdl-list">
                    <li class="list_event-name mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="icon fa fa-music" aria-hidden="true"></i>
                            $event_name
                        </span>
                    </li>
                    <li class="list_artist-name mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="icon fa fa-user-circle" aria-hidden="true"></i>
                            $artist_name
                        </span>
                    </li>
                    <li class="list_venue-name mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <i class="icon fa fa-home" aria-hidden="true"></i>
                            $venue_name
                        </span>
                    </li>
                </ul>
            </div>
            <a href="detail.php?id=$id&date=$date&time=$time&event_name=$event_name&artist_name=$artist_name&venue_name=$venue_name&venue_add=$venue_add&event_url=$event_url">リンク</a>
        </div>
        </div>
AAA;
}



?>
    </div>
        <footer class="footer">
        <center><a href="home.html">&copy;2017 L.I.P. Executive Committee</a></center>
    </footer>
</body>
</html>