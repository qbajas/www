<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta  http-equiv="Content-Type"  content="application/xhtml+xml; charset=UTF-8"  />
<meta  http-equiv="Content-Style-Type" content="text/css" />

<title> Jakub Jaśkowiec </title>	

<link rel="stylesheet"   title="ver1"     href="style/style1.css" type="text/css" />
<link rel="alternate stylesheet"   title="ver2"     href="style/style2.css" type="text/css"  />

<script type="text/javascript" src="js/moj1.js" > </script>

</head>

<body onload="styles()">

<div class="header" id="top">
<h1> Jakub Jaśkowiec </h1>

<div class="style_changer" >
Change style:
<select  id="changer" >
<option disabled="disabled" >Choose style </option>
</select>
</div>


<div class="menu" >

<?php
//header('Content-Type: text/html; charset=utf-8');
include('php/menu.php');
print_menu();
//echo "sukces";
?>


</div>
</div>


<div class="content">

<h2 id="pe">Past Explorer</h2>
Social network service which aim is to show how different things changed. Written during 4th year of studies with Bartlomiej Hyzy and Michal Pierog. Technology: C# (ASP .Net MVC 3), PostgreSQL, NHibernate, JQuery.
<br/>
Github repository: 
<a href="https://github.com/qbajas/PhotoHistory">https://github.com/qbajas/PhotoHistory</a>
<br/>
<img src="images/screen-pe.png" width="400"/>

<h2 id="fr">Face recognition</h2>
Program which uses neural network to recognize faces. Created with Michal Pierog. Technology: Java.
<br/>
Github repository: 
<a href="https://github.com/qbajas/Face-recognition">https://github.com/qbajas/Face-recognition</a>
<br/>
<img src="images/screen-fr.png" width="400"/>

<h2 id="le"> Learning english </h2>
Web application for learning english.
<br/>
Github repository: 
<a href="https://github.com/qbajas/inzynierka">https://github.com/qbajas/inzynierka</a>
<br/>
Technology: Ruby on Rails.
<br/>
<a href="http://english.jaskowiec.com.pl"> <img src="images/screen-le.png" width="400" alt="Learning english" /> </a>

<h2 id="hb"> Helpbets.com </h2>
Ruby on Rails commercial project.
<br/>
<a href="http://helpbets.com"> <img src="images/screen-hb.png" width="400" alt="Helpbets" /> </a>

<h2 id="sn"> Sportnewsy.pl </h2>
Ruby on Rails commercial project.
<br/>
<a href="http://sportnewsy.pl"> <img src="images/screen-sn.png" width="400" alt="Sportnewsy" /> </a>

<h2 id="dss">Decision support system</h2>
Medical decision support system based on neural network.
<br/>
Co-creators: Witold Baran, Bartlomiej Hyzy, Mateusz Niesyto, Michal Pierog.
<br/>
Github repository: <a href="https://github.com/qbajas/medycyna_projekt">https://github.com/qbajas/medycyna_projekt</a>
<br/>
Technology: Java
<br/>
<a href="images/screen-dss.png"> <img src="images/screen-dss.png" width="400" alt="" /> </a>

<h2 id="pks"> Professional klika solver </h2>
The aim of this program is to showcase the possibilities of genetic algorithm on the example of solving the maximum clique problem.
<br/>
The algorithm finds the biggest clique in an undirected graph (clique is a subset of graph's vertices such that every two vertices in the subset are connected by an edge).			
<br/>
Co-creators:   Michal Pierog, Witold Baran.
<br/>
Technology: Java.
<br/>

<a href="images/screen_klika.png"> <img src="images/screen_klika.png" width="400" alt="Klika" /> </a>


<h2 id="c"> Crossword </h2>
An interactive program, which creates simple and advanced crosswords from the given database of words and definitions, and provides
an interactive GUI for solving them. The program can be used either for fun or for educational purposes, e.g. learning new words.
<br/>
Technology: Java
<br/>
<a href="screen_crossword.png"> <img src="screen_crossword.png" width="400" alt="Crossword" /> </a>

<h2 id="t"> Tetris </h2>
A game written as a 1st year project, in old-fashioned Pascal.
<br/>
<a href="images/tetris.pas">Source code</a>
<br/>
<a href="images/screen_tetris2.png"> <img src="images/screen_tetris2.png" width="400" alt="Crossword" /> </a>



</div>


<?php
include('php/footer.php');
?>



</body>
</html>
