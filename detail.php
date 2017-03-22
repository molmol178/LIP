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
        <meta charset="utf-8">
        <title>Live Information Platform in Hamamatsu</title>
    </head>
<body>
    <header id="target">
        <div class="logo">
            <a href="index.php"><img src="img/lip.png" width="50" height="50" alt="ロゴ" /></a>
        </div>
    </header>

<div class="main">
    <div class="detail_date">
        <?php $date = $_GET['date'];
        echo $date; ?>
    </div>
    <div class="detail_event_name">
        <?php $event_name = $_GET['event_name'];
        echo $event_name; ?>
    </div>
    <div class="detail_child">
        <p class="detail_subtitle">時間</p>
        <?php $time = $_GET['time'];
        echo $time; ?>
    </div>
    <div class="detail_child">
        <p class="detail_subtitle">アーティスト</p>
        <?php $artist_name = $_GET['artist_name'];
        echo $artist_name; ?>
    </div>
    <div class="detail_child">
        <p class="detail_subtitle">会場</p>
        <?php $venue_name = $_GET['venue_name'];
        echo $venue_name; ?>
    </div>
    <div class="detail_child">
        <p class="detail_subtitle">会場住所</p>
        <?php $venue_add = $_GET['venue_add'];
        echo $venue_add; ?>
    </div>
    <div class="detail_child">
        <p class="detail_subtitle">URL</p>
        <?php $event_url = $_GET['event_url'];
        echo '<a href="'.$event_url.'">'.$event_url.'</a>'; ?>
    </div>

</div>

    <footer class="footer">
        <center><a href="home.html">&copy;2017 L.I.P. Executive Committee</a></center>
    </footer>
</body>
</html>