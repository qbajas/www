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
			
			<h2 id="s"> My skills: </h2>
			<table class="table1">
			<colgroup span="2">
				<col span="1" class="col1" />
				<col span="1" class="col2" />
			</colgroup>
			<tr><td>Programming</td>	<td> Ruby, Java, C#</td></tr>
			<tr><td>Web technologies </td> 	<td> Ruby on Rails, (X)HTML, CSS </td></tr>
			<tr><td>Foreign languages </td> <td>English (fluently), German (basics)</td></tr>
			</table>
			
			<br/>


			<h2 id="a"> List of the most notable documented achievements: </h2>

			<img src="images/fce.jpg" alt="FCE" /> 
			<img src="images/cae.gif" alt="CAE" />  
			<img src="images/cpe.jpg" alt="CPE" />
			
			<table style="margin-top: 10px;" >
			<tr><td>Official high-level English exams: FCE, CAE and CPE </td></tr>
<tr><td> Completed NetBeans Platform Certified Training and granted "NetBeans Platform Certified Associate"  </td></tr>
			<tr><td>Participation in Polish Olympiad in Informatics (Olimpiada Informatyczna) and progression to the 2nd (out of 3) stage.</td></tr>
			<tr><td>The result of 100% points in extended Matura exam in Mathematics.</td></tr>
			</table>
			

			
			
			
		</div>
		
		
<?php
include('php/footer.php');
?>
		
		
		
	</body>
	</html>
