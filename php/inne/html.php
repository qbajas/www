<?php
function naglowek($tytul) {
	$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>'.$tytul.'</title>
	</head>
	<body>';
	return $html;
}
 
function stopka() {
	$html = '</body></html>';
	return $html;
}



function wczytajPlik($nazwa_pliku) {
	$plik = fopen($nazwa_pliku, 'r');
		$html .= '';
			while (!feof($plik)) {
				 	$html .= fgets($plik);
						}
							fclose($plik);
								return $html;
								}
