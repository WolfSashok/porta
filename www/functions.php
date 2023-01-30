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
function getUniqSymbol($text) {

    $text = explode(" ", $text);                          // Cut the text into words and dump it into array.

    foreach ($text as $word){                             // Work with text array, use every word and make changes.
        $long = strlen($word);                            // Count symbols in word.
        $i = 0;
        while ($i < $long) {                              // Find the first uniq symbol.
            if (substr_count($word, $word[$i]) == 1) {    // If symbol is uniq, write symbol to 'symbols' and break while.
                $symbols[] = $word[$i];
                break;
            }
            $i++; 
        } 
    }

    if (!empty($symbols)) {
        foreach ($symbols as $symbol){                        // Work with symbols
             if (count(array_keys($symbols, $symbol)) == 1) { // If the symbol is uniq, break.
                break;
            }
        }
    }

return $symbol;
}


?>