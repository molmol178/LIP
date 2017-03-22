<?php
require_once'dsn.php';
global $connect;
$connect = mysql_connect(HOST,USER,PW)
or die('Could not connect to mysql server.' );
mysql_query( "set names utf8");
mysql_select_db(DB,$connect)
or die('Could not select database.');

$sql = "SELECT * FROM event WHERE date >= date(now()) ORDER BY date ASC";
// $sql = "SELECT *
// FROM event
// WHERE id = '1'";
$result = mysql_query($sql, $connect);
// var_dump($result);
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
    <div class="demo-card-wide mdl-card mdl-shadow--4dp">
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