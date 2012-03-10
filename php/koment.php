<?php header('Content-Type: text/html; charset=utf-8'); ?>
<?php


if ( sizeof($_POST) == 0 )
{
    $html .='';
    $html .=file_get_contents('../js/comment.html');
    $html .='
    <script type="text/javascript">
    var list = new Array();';
    
    $ourFileName = "database";
    $ourFileHandle = fopen($ourFileName, 'r') or die("can't open file");

    $counter=0;
    while(!feof($ourFileHandle))
    {
      $html .= 'list['.$counter.'] = "';
      $html .= rtrim(fgets($ourFileHandle));
      $html .= '";';
      $counter=$counter+1;
    }
    fclose($ourFileHandle);


    $html .='
    function check(field)
    {
        for ( i in list )
        field.value = field.value.replace(list[i],"CENZURA");
    }
    </script>';
    
    echo $html;
}
else
{

//if((!isset($_GET['nazwa']) ||!isset($_GET['wpis'])) && sizeof($_POST)==0 ) echo  showBlogs();
//else {
    if(file_exists('../php/blogi/' . $_GET['nazwa'] . '/' . $_GET['wpis'])) comment();
    else {
        echo '<p class="error">BLAD. Podany wpis lub blog nie istnieje.</p>';
    }
//}
}

   function comment()
   {

	  if(sizeof($_POST) == 0)
              { showForm();     return;}

	  $error=0;
	  if($_POST['comment']=='')  	{$error=1; echo '<p class="error">Podaj komentarz!<br /></p>';}
	  if($_POST['userName']=='')  	{$error=1; echo '<p class="error">Podaj nazwe uzytkownika !<br/></p>';}
	  if($error==1) return;

	  $folder='../php/blogi/'.$_GET['nazwa'].'/'.$_GET['wpis'].'.k';
	  if(!file_exists($folder)) mkdir($folder,0755);
	  $files= scandir($folder);
      $fileID=sizeof($files)-2;

	  $file=@fopen($folder .'/' . $fileID,'w');
	  if($file==FALSE)
		{
		  echo  '<p class="error">Błąd.</p>';
		  return;
		}

	 	fputs($file,$_POST['commentType'] . "\n");
	 	fputs($file, date('Y-m-d, H:i:s') . "\n");
	    fputs($file,$_POST['userName'] ."\n");
		fputs($file,str_replace("\r",'',$_POST['comment']) ."\n");
		fclose($file);
		chmod($folder.'/'.$fileID,0755);


	  echo '<p class="success">Dodano komentarz.</p>';
          echo '<br><a href="blog.php">Powrót</a>';

	}


?>