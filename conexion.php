<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'BodasEliteGroup';

    $conection = @mysqli_connect($host,$user,$password,$db);
    $conection -> set_charset("utf8");

  
    if(!$conection)
    {
        echo"no se conecto";
    }
?>