<?php
	include ('common.inc.php');

	$s_lektion = $get_id;
	$s_satz = 0;
	$s_rf = array();
	
	
	$sql = "SELECT * FROM inhalte WHERE lektion=" . $get_id . " ORDER BY id ASC";
	$erg = mysql_query($sql);

	while ($zeile = mysql_fetch_array($erg))
	{	
		$s_rf[$zeile['id']] = 'undone';
	}
?>

<html>
<head>
    <title>Lektion beginnt ...</title>
    <style type="text/css">
    </style>

<meta http-equiv="refresh" content="0; URL=lektion_main.php" />
</head>
</html>