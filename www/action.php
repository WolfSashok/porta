<?php

//Funct - Get users IP address
include 'functions.php';

//Get users IP address
$ip = getUserIpAddr();

//Geo IP
$geo = getGeoIpInfo($ip);

//Work with a text. Exec scripts with algorithm
if(isset($_POST["text"]) && isset($_POST["language"])) {
    $text = str_replace("\n", " ", (htmlentities($_POST["text"]))); //replace character wraps
    $language = htmlentities($_POST["language"]);

    echo "<center>You choosed ".$language."<br><br>";
    echo "
    <center>OK! Let's check it:)<br>
    You have written this text:<br>
    ============================================<br>
    \"$text\"<br>
    ============================================<br><br>";

// Check text area.
if (empty($text)) {
echo "<center><font size=5 color=FF0000>Sorry, You should input some text.<br><br></font>";
goto end;
}


//switch languages
    switch ($language) {
        case 'BASH':
            $result = shell_exec("bash algoritm.sh '".$text."'"); // Use bash script.
            break;
        case 'PHP':
            $result = getUniqSymbol($text);                       // Use php function.
            break;
        case 'Python':
            $result = getPythonAlg($text);
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

    if (empty($result)) {
        echo "<center><font size=5 color=FF0000>O-O-O-p-s-s-s. There isn't uniq symbol!<br>
        Please try againg.</font><br>";
    }
    else
    {
        echo "<font size=5 color=00FF00>!!!!!!!!!CONGRATULATION!!!!!!!!!<br><br>
        The symbol is <b>\"$result\"</b></font><br><br>";
    }
}

else

{
    echo "Введенные данные некорректны<br>";
}

end:
    echo "<center><br><br>============================================<br>Your ip address is \"".$ip."\"";
    echo "<center><br>You are from \"".$geo['country'].": ".$geo['city']."\"";
    if ($geo['country'] == "UA") echo "<br><br>СЛАВА УКРАЇНІ!!!<br>";
    echo "<center><br><a href=\"http://34.118.32.155/\">BACK</a>";

?>