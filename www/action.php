<?php
if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = htmlentities($_POST["text"]);

    $output ="
    <html>
    <head>
    <title>Повторяем текст</title>
    </head>
    <body>
    You wrote: $text<br />
    <ul>";

    foreach (count_chars($text, 1) as $i => $val) {
        echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n";
        echo "<br>";
    }

//    echo $count";
//    echo $output;
}
else
{   
    echo "Введенные данные некорректны";
}
?>