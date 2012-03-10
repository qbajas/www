<?php

if ( !mkdir("../php/blogi/" . $_POST['blog'], 0755) )
    echo '<h2>Taki blog ju� istnieje !</h2>';
else
    {
    //$ourFileName = "/home/infsgrp/qbajas/public_html/www/php/".$_POST['blog']."/info";
    $ourFileName = "../php/blogi/".$_POST['blog']."/info";
    $ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
    fwrite($ourFileHandle, $_POST['username']."\n" );
    fwrite($ourFileHandle, md5( $_POST['passwd'] ) ."\n");
    fwrite($ourFileHandle, $_POST['desc']);
    fclose($ourFileHandle);

    echo '<h2>Utworzono nowy blog o nazwie: </h2>' . $_POST['blog'];
    echo '<br><a href="blog.php">Powrót</a>';

    }

    
?>