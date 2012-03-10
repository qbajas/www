<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php

    if ( sizeof($_POST) == 0 )
    {
        $html .=file_get_contents('../js/add.html');
        echo $html;
    }
    else
    {
    //$path_parts = pathinfo( getcwd() );
    //echo $path_parts['basename'], "<br>\n";

    //echo $path_parts['dirname'], "<br>";
    //echo $path_parts['extension'], "<br>\n";
    //echo $path_parts['filename'], "<br>\n"; // since PHP 5.2.0

    //$ourFileName = "/home/infsgrp/qbajas/public_html/www/php/".$_POST['blog']."/info";
    $ourFileName = "../php/blogi/".$_GET['blog']."/info";
    $ourFileHandle = fopen($ourFileName, 'r') or die("can't open file");

    $string1 = fgets($ourFileHandle);
    $string2 = fgets($ourFileHandle);
    //echo rtrim($string);
    if ( strcmp($_POST['user'], rtrim($string1) ) == 0 
            && strcmp(  md5($_POST['pass']) , rtrim($string2) ) == 0)
            {
            addEntry();
            echo '<br><a href="blog.php">Powrót</a>';
            }
    else echo "<h2>Niepoprawny login.</h2>";
    //echo fgets($ourFileHandle);
    //fread($ourFileHandle, );
    //if ( $_POST['username'] ==  )
    //if ( md5 ($_POST['passwd']) == md5() )
    fclose($ourFileHandle);
    }


function addEntry() {
    $time = localtime();
    $ourFileName = "../php/blogi/".$_GET['blog']."/"
            .str_replace("-","",$_POST['date']) . str_replace(":","",$_POST['time']) . $time[0];

    $tmpID='00';
    while(file_exists($ourFileName . $tmpID))
    {
        $counter++;
        if($counter<10) $tmpID='0' . $counter;
        else $tmpID=$counter;
    }
    $ourFileName.=$tmpID;


    $file = fopen($ourFileName, 'w') or die("can't open file");

    fputs($file,str_replace("\r","",$_POST['news']));
    echo "<h2>Dodano wpis</h2>";
    fclose($file);
    uploadFile($ourFileName);
}




function uploadFile($fName) {
    global $html;
    $counter=0;
    $fileNames=array_keys($_FILES);
    
    foreach($fileNames as $name) {
        if ($_FILES[$name]["error"] == 4) continue;
        if ($_FILES[$name]["error"] > 0)
            $html .= '<p class="error">Błąd dodania pliku. Kod błędu : '.$_FILES[$name]["error"] .'</p>';
        
        else {
            $newName=$fName;
            if($counter<10) $newName .='0' . $counter;
            else $newName .= $counter;
            $newName .= substr($_FILES[$name]["name"],strlen($_FILES[$name]["name"])-4,4);
            move_uploaded_file($_FILES[$name]["tmp_name"],$newName);
            $counter++;
            echo "<h3>Wykonano upload pliku </h3>";
        }
    }

}

    
        ?>