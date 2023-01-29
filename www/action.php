<?php

//Funct - Get users IP address
include 'functions.php';

//Get users IP address
$ip = getUserIpAddr();

//Geo IP
$geo = getGeoIpInfo($ip);

//Work with a text. Exec scripts with algorithm
if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = str_replace("\n", "", (htmlentities($_POST["text"]))); //replace character wraps
    $language = htmlentities($_POST["language"]);

echo "<center>You choosed ".$language."<br><br>";

//switch languages
switch ($language) {
    case 'BASH':
        $result = shell_exec("bash algoritm.sh '".$text."'");
        break;
    case 'PHP':
        echo "<center>Sorry. ".$language." will be available soon. Try other languages.";
        break;
    case 'Python':
        echo "<center>Sorry. ".$language." will be available soon. Try other languages.";
        break;
    case 'Java':
        echo "<center>Sorry. ".$language." will be available soon. Try other languages.";
        break;
    case 'Ruby':
        echo "<center>Sorry. ".$language." will be available soon. Try other languages.";
        break;
    default:
        echo "<center>O-o-o-p-s. Choose language.";
}

    echo $result;

}
else
{
    echo "Введенные данные некорректны<br>";
}

    echo "<center><br>Your ip address is \"".$ip."\"";
    echo "<center><br>You are from \"".$geo['country'].": ".$geo['city']."\"";
    if ($geo['country'] == "UA") echo "<br><br>СЛАВА УКРАЇНІ!!!<br>";
    echo "<center><br><a href=\"http://34.116.191.145/\">BACK</a>";
    
?>