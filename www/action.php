<?php
if(isset($_POST["text"]) && isset($_POST["language"])) 
{
    $text = htmlentities($_POST["text"]);
//    $language = htmlentities($_POST["language"]);

//    if(isset($_POST["hostel"])) $hostel = "да";
//    $comment = htmlentities($_POST["comment"]);
//    $courses = $_POST["courses"];
    $output ="
    <html>
    <head>
    <title>Повторяем текст</title>
    </head>
    <body>
    You wrote: $text<br />
    <ul>";
//    foreach($courses as $item)
//        $output.="<li>" . htmlentities($item) . "</li>";
//    $output.="</ul></body></html>";
    foreach (count_chars($text, 1) as $i => $val) {
        echo "\"" , chr($i) , "\" встречается в строке $val раз(а).\n";
        echo "<br>";
    }

//    echo $count."<br>";
//    echo $output;
}
else
{   
    echo "Введенные данные некорректны";
}
?>