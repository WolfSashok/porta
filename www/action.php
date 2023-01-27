<?php

//Get users IP address
function getUserIpAddr() {
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
$ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
$ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}
$ip = getUserIpAddr();


//Geo IP
require_once 'SxGeo.php';
$SxGeo = new SxGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
$city = $SxGeo->getCityFull($ip);
$country_code = $city['country']['iso'];
$city_name_en = $city['city']['name_en'];
$lat = $city['city']['lat'];
$lon = $city['city']['lon'];
//Geo IP

if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = htmlentities($_POST["text"]);
    $text = str_replace("\n", "", $text);

//echo $text;

    $result = shell_exec("bash algoritm.sh '".$text."'");

//    $output ="
//    <html>
//    <head>
//    <title>Повторяем текст</title>
//    </head>
//    <body>
//    You wrote: $text<br />
//    <ul>";


    echo $result;

//    foreach (count_chars($text, 1) as $i => $val) {
//        echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n";
//        echo "<br>";
//    }

//    echo $count";
//    echo $output;
}
else
{   
    echo "Введенные данные некорректны<br>";
}

    echo "<center><br>Your ip address is \"".$ip."\"";
    echo "<center><br>You are from \"".$country_code.": ".$city_name_en."\"";
    if ($country_code == "UA") echo "<br><br>СЛАВА УКРАЇНІ!!!<br>";
    echo "<center><br><a href=\"http://34.116.191.145/\">BACK</a>";
    
?>