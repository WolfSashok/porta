<?php

//Funct - Get users IP address
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

//Work with a text. Exec bash script with algorithm
if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = htmlentities($_POST["text"]);
    $text = str_replace("\n", "", $text);

    $result = shell_exec("bash algoritm.sh '".$text."'");

    echo $result;

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