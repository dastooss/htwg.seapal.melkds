<?php
	include 'DB_data.php';
	
 	$con = mysql_connect($ServerAdr, $UserName, $pw);
	if(!$con) {
		die('Cold not connect: ' .mysql_error());
	}

	// Hier evtl. die DB anpassen
	mysql_select_db($database, $con);

	// Variable für Ergebnis
	$result = array();

	$boot_name = $_POST['boot'];
	// Hier evtl. die Tabelle anpassen
	$sql = 'SELECT * FROM boatinfo2
			WHERE bootsname = ' . '\'' . $boot_name . '\'';

	$content = mysql_query($sql, $con);

	if (!$content) {
		die('Error: ' . mysql_error());
	} else {
		$row = mysql_fetch_array($content);
		$typ = $row['typ'];
		$konstukteur = $row['konstrukteur'];
		$laenge = $row['laenge'];
		$eigner = $row['eigner'];

		$result [] = array('bootsname'=>$boot_name,
						   'typ'=>$typ,
						   'konstrukteur'=>$konstukteur,
						   'laenge'=>$laenge,
						   'eigner'=>$eigner);
  	}

  	// DB schließen
	mysql_close($con);

	echo json_encode($result);

?>