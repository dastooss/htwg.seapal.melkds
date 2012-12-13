<?php
	include 'DB_data.php';
	
 	$con = mysql_connect($ServerAdr, $UserName, $pw);
	if(!$con) {
		die('Cold not connect: ' .mysql_error());
	}

	// Hier evtl. die DB anpassen
	mysql_select_db($database, $con);

	$bootsname = 	$_POST['bootsname'];
	$registernr = 	$_POST['registernr'];
	$segelzeichen = $_POST['segelzeichen'];
	$heimathafen =	$_POST['heimathafen'];
    $yachtclub = 	$_POST['yachtclub'];
	$eigner = 		$_POST['eigner'];
    $versicherung = $_POST['versicherung'];
	$rufzeichen = 	$_POST['rufzeichen'];
	$typ =	 		$_POST['typ'];
	$konstrukteur = $_POST['konstrukteur'];
	$laenge = 		$_POST['laenge'];
	$breite = 		$_POST['breite'];
    $tiefgang = 	$_POST['tiefgang'];
	$masthoehe = 	$_POST['masthoehe'];
	$verdraengung = $_POST['verdraengung'];
    $rigart = 		$_POST['rigart'];
	$baujahr = 		$_POST['baujahr'];
	$motor = 		$_POST['motor'];
    $tankgroesse = 	$_POST['tankgroesse'];
	$wassertankgroesse = 	$_POST['wassertankgroesse'];
    $abwassertankgroesse =  $_POST['abwassertankgroesse'];
	$grosssegelgroesse = 	$_POST['grosssegelgroesse'];
    $genuagroesse = 		$_POST['genuagroesse'];
	$spigroesse = 			$_POST['spigroesse'];
	
	// JSON in DB schreiben
	// Hier evtl. die Tabelle anpassen
	$sql="INSERT INTO boatinfo2(bootsname, registernr, segelzeichen,
  	      heimathafen, yachtclub, eigner, versicherung, rufzeichen,
  		  typ, konstrukteur, laenge, breite, tiefgang, masthoehe,
  		  verdraengung, rigart, baujahr, motor, tankgroesse,
  		  wassertankgroesse, abwassertankgroesse, grosssegelgroesse,
  		  genaugroesse, spigroesse)
  		  VALUES
  		  ('$bootsname', '$registernr', '$segelzeichen', '$heimathafen',
		   '$yachtclub', '$eigner', '$versicherung', '$rufzeichen',
		   '$typ', '$konstrukteur', '$laenge', '$breite', '$tiefgang',
		   '$masthoehe', '$verdraengung', '$rigart', '$baujahr',
		   '$motor', '$tankgroesse', '$wassertankgroesse',
		   '$abwassertankgroesse', '$grosssegelgroesse',
		   '$genuagroesse', '$spigroesse')";

	if(!mysql_query($sql, $con)) {
		die('Error:' .mysql_error());
	}
	
	mysql_close($con);
?>