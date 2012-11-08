<?php
    if( empty ($_POST['fromForm']) == FALSE ) {
	$con = mysql_connect("rdbms.strato.de", "U1178561", "melkds");
	if(!$con) {
		die('Could not connect: ' .mysql_error());
	}

	mysql_select_db("DB1178561", $con);
	$sql="INSERT INTO DB1178561.boatinfo(bootsname, registernr, segelzeichen,
		  heimathafen, yachtclub, eigner, versicherung, rufzeichen,
		  typ, konstrukteur, laenge, breite, tiefgang, masthoehe,
		  verdraengung, rigart, baujahr, motor, tankgroesse,
		  wassertankgroesse, abwassertankgroesse, grosssegelgroesse,
		  genaugroesse, spigroesse)
		  VALUES
		  ('$_POST[bootsname]','$_POST[registernr]','$_POST[segelzeichen]',
		   '$_POST[heimathafen]','$_POST[yachtclub]','$_POST[eigner]',
		   '$_POST[versicherung]','$_POST[rufzeichen]','$_POST[typ]',
		   '$_POST[konstrukteur]','$_POST[laenge]','$_POST[breite]',
		   '$_POST[tiefgang]','$_POST[masthoehe]','$_POST[verdraengung]',
		   '$_POST[rigart]','$_POST[baujahr]','$_POST[motor]',
		   '$_POST[tankgroesse]','$_POST[wassertankgroesse]',
		   '$_POST[abwassertankgroesse]','$_POST[grosssegelgroesse]',
		   '$_POST[genaugroesse]','$_POST[spigroesse]')";
	if(!mysql_query($sql, $con)) {
		die('Error:' .mysql_error());
	}

	echo "1 record added";
	mysql_close($con);
    } else {
        echo 'Access denied!';
    }
?>