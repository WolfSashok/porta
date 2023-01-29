<?php

//Get IP address
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

//Get Geo IP info
function getGeoIpInfo($ip) {
    require_once 'SxGeo.php';
    $SxGeo = new SxGeo('SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
    $city = $SxGeo->getCityFull($ip);
    $array["country"] = $city['country']['iso'];
    $array["city"] = $city['city']['name_en'];
    $array["lat"] = $city['city']['lat'];
    $array["lon"] = $city['city']['lon'];
    return $array;
}


//Get uniq symbol
function getUniqSymbol() {

}

?>