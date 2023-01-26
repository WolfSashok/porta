<?php
if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = htmlentities($_POST["text"]);
    $text = str_replace("\n", "", $text);
;
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
    echo "Введенные данные некорректны";
}
?>