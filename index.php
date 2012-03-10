<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta  http-equiv="Content-Type"  content="application/xhtml+xml; charset=UTF-8"  />
<meta  http-equiv="Content-Style-Type" content="text/css" />

<title> Jakub Jaśkowiec - Homepage </title>

<link    title="ver1" href="style/style1.css" type="text/css" rel="stylesheet"/>
<link    title="ver2" href="style/style2.css" type="text/css" rel="alternate stylesheet"/>

<script  src="js/moj1.js" type="text/javascript" > </script>

</head>


<body  onload="styles()">


<div class="header" id="top">


<h1 > Jakub Jaśkowiec</h1>

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

<h2 id="me"> About me </h2>
<div class="field">
<a href="images/me.jpg"> <img style="float:right; margin-top:0;" src="images/me_mini.jpg" alt="Jakub Jaśkowiec 2008" /> </a>
I am in the fourth year of <strong>Computer Science</strong> at the University of Science and Technology (AGH) in Cracow.
</div>            
<br/>

<h2 id="contact"> Contact </h2>
<div class="field">
<img style="float:left; margin-top:0px; margin-right:40px;" src="images/email.jpg" alt="mailme" height="80" />
e-mail: <a href="mailto:qbajas@gmail.com"> qbajas@gmail.com </a>
</div>            

<br/>
<br/>

<h2 id="others"> Others </h2>
<div class="field">
My Github account : <a href="http://github.com/qbajas">http://github.com/qbajas</a>
</div>            

<br/>
<br/>

</div>


<div class="footer">


&copy; 2010 Jakub Jaśkowiec 			


<a href="http://validator.w3.org/check?uri=referer"><img
src="http://www.w3.org/Icons/valid-xhtml10"
alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>

<a href="http://jigsaw.w3.org/css-validator/check/referer">
<img style="border:0;width:88px;height:31px"
src="http://jigsaw.w3.org/css-validator/images/vcss"
alt="Poprawny CSS!" />
</a>

<a href="#top"> To the top </a>		

</div>




</body>
</html>
