<?php header('Content-Type: text/html; charset=utf-8'); ?>

<?php
        include 'header.php';

	ob_start();
	if(isset($_GET['nazwa']))
        {
            echo  printBlog();
            echo '<br><a href="blog.php">Powrót</a>';
        }
	else
        {
            echo printBlogs();
            echo "<br><h3>Utwórz nowy blog</h3>";
            $html .=file_get_contents('../js/create.html');
        }
	
        echo $html;
 
   ob_flush();
   
   
   function printBlog()
   {
	   echo "<h2>To jest blog: ".$_GET['nazwa']."</h2>";
	   $folder_name= "blogi/" . $_GET['nazwa'];
	    if(!file_exists($folder_name)) 
		{
		  return '<p class="error">Blog o podanej nazwie nie istnieje</p>';
		}   
		
		$blogDir = $folder_name . '/';
		$files= scandir($blogDir);
		echo  showInfo($blogDir);
		echo "\n<div class=" .'"wpisy">' ."\n";
	
		foreach($files as $file)
  		{
  			if($file=="." || $file=="..") continue;
			if (strlen($file)==16) processBlog($file, $blogDir);
		} 
		echo  "\n" . '</div>' . "\n";
	}


   function showInfo($blogFolder)
   {
	 echo '<div class="userInfo">' ."\n";
	 $fileStream= fopen($blogFolder . 'info','r');
	 $username=fgets($fileStream);
	 @fgets($fileStream); //ominięcie hasła
	 $content=nl2br(htmlspecialchars(file_get_contents($blogFolder.'info',0,NULL,ftell($fileStream))));
	 fclose($fileStream);
	 echo  "<p>Założyciel blogu: ". $username. " </p> \n";
	 echo  "<p>Opis blogu:</p>\n" .'<div class="blogDescription">' . " \n";
	 echo  $content."\n</div>";
	 echo '<p><a href="wpis.php?blog=' .$_GET['nazwa'] . '">'. "Dodaj wpis</a></p>\n</div>\n";
	}


        
   function processBlog($wpis,$blogFolder)
   {
	  

          echo "<br/>";
	  echo  '<div class="wpis">';
	  echo  '<h3> ' . 'Wpis z '  . substr($wpis,0,4) . '-' .  substr($wpis,4,2) . '-';
	  echo   substr($wpis,6,2) . ' &nbsp;' . substr($wpis,8,2) .':' . substr($wpis,10,2);
	  echo  "</h3>\n";
	  echo  '<div class ="commentContent">'."\n";
	  echo   nl2br(htmlspecialchars(file_get_contents($blogFolder . $wpis)));
	  echo  "</div>\n";
	  uploadFiles($wpis,$blogFolder);
	  
	  processComments($wpis,$blogFolder);

	  echo  '</div>';
	}
   
	function printBlogs()
	{
		$counter=0;
		$html= "<h2>Lista blogów:</h2> ";
		$dir = opendir("blogi/");
		while (($file = readdir($dir)) !== false)
  		{
  			if($file!=".." && $file!=".")
			{
                            $html.= "<li>";
                            $html.=showHyperlink($file); $counter++;}
                            $html.= "</li>";
		}
		closedir($dir);
		if ($counter==0) $html='<h2>Brak blogow</h2>';
		return $html;
	}
   
   function processComments($wpis,$blogFolder)
   {
	  echo "\n" . '<div class="comments">' . "\n";
	  if (!file_exists($blogFolder . $wpis . '.k'))
	  {
		echo  '<p class="commentHeaderP">Brak komentarzy</p>' ."\n";
		echo  '<p class="comment_link_p">' . '<a href="koment.php?nazwa=' . $_GET['nazwa']. '&wpis=' . $wpis . '">Dodaj komentarz </a></p></div>';
		return;  
	  }
	  echo '<h4>Komentarze:</h4>';
	  $files= scandir($blogFolder . $wpis .'.k/');
	  foreach($files as $file)
  		{
  			if($file=="." || $file==".." || $file==$wpis) continue;
			$fileName = $blogFolder . $wpis .'.k/' .$file;
			$fileStream = fopen($fileName,'r');
			$type = rtrim(fgets($fileStream));
			$date = rtrim(fgets($fileStream));
			$username = rtrim(fgets($fileStream));
			$commentContent = nl2br(htmlspecialchars(file_get_contents($fileName,0,NULL,ftell($fileStream))));
                        echo "- ".$type;
			echo  '<div class="' . $type . '">' . "<p class='commentP'>Dnia $date &nbsp; $username napisał(a):</p>\n" .'<p class="commentText">' . $commentContent. '</p></div>';
			
			fclose($fileStream);
	
		} 
	   
	  	  echo  '<p class="comment_link_p">'.'<a href="koment.php?nazwa=' . $_GET['nazwa']. '&wpis=' . $wpis . '">Dodaj komentarz </a></p>';
	  echo '</div>';
	   
	   
  }
   
	function showHyperlink($fname)
	{
	  $tmp= '<p><a href="./blog.php?nazwa=' . $fname . '">'.  $fname .'</a></p>'	;
	  return $tmp;
	}
   
   
   function uploadFiles($wpis,$blogFolder)
   {
	 $counter=1;
	 echo '<div class="uploaded"><p class="uploadedP">Załączniki: </p>';
	 $files= scandir($blogFolder);
        foreach($files as $file)
        {
                if($file=="." || $file==".." || $file==$wpis || is_dir($blogFolder . $file)) continue;
                if ((strcmp($wpis,substr($file,0,16))==0))
            {
                        echo   '<a href="'.$blogFolder.$file.'">'.  'Załącznik' . $counter;
                        echo  substr($file,strlen($file)-4,4) .'</a><br/>';
                        $counter++;
                }
        }
	 if($counter==1) echo 'Brak załączników <br/>';
	 echo  '</div>';
   }
   
   


        
        
?>
