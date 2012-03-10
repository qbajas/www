<?php header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml">
	
    <head>
		
		<meta  http-equiv="Content-Type"  content="application/xhtml+xml; charset=UTF-8"  />
		<meta  http-equiv="Content-Style-Type" content="text/css" />
		
		
		<title> Jakub Jaśkowiec </title>		
		
		<link rel="stylesheet"   title="ver1"     href="style/style1.css" type="text/css"  />
		<link rel="alternate stylesheet"   title="ver2"     href="style/style2.css"  type="text/css" />

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
			
			<h2 id="a"> List of the most notable documented achievements: </h2>

			<img src="images/fce.jpg" alt="FCE" /> 
			<img src="images/cae.gif" alt="CAE" />  
			<img src="images/cpe.jpg" alt="CPE" />
			
			<table >
			<tr><td>Official high-level English exams: passed FCE and CAE (both grade B), CPE - taking this year ...</td></tr>
			<tr><td>Completed Axon C++ course.</td></tr>
			<tr><td>Participation in Polish Olympiad in Informatics (Olimpiada Informatyczna) and progression to the 2nd (out of 3) stage.</td></tr>
			<tr><td>The result of 100% points in extended Matura exam in Mathematics.</td></tr>
			<tr><td>Co-translation of the website <a href="http://helpbets.com/">Helpbets.com</a> </td></tr>
			</table>
			

			
			<br/>
			
			<h2 id="s"> My skills: </h2>
			<table class="table1">
			<colgroup span="2">
				<col span="1" class="col1" />
				<col span="1" class="col2" />
			</colgroup>
			<tr><td>Programming</td>	<td>  C++, also: C, Pascal, Java.</td></tr>
			<tr><td>Web technologies </td> 	<td> (X)HTML, CSS, Javascript </td></tr>
			<tr><td>Basic Graphics </td>	<td> 2D: Photoshop, GIMP; 3D: Softimage XSI </td></tr>
			<tr><td>Foreign languages </td> <td>English (fluently), German (basics)</td></tr>
			</table>
			
			
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