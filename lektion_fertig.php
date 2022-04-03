<?php
	include ('common.inc.php');
?>
<html>
<head>
    <title>Tippen Lernen mit 10 Fingern</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>


	<h1>Fertig</h1>

	<div style="margin-left: 100px; padding-bottom: 20px; padding-top: 150px; width: 70%">Du hast <?php echo $_SESSION['s_fehler'] ?> Fehler in <?php echo count($_SESSION['s_rf']) ?> Sätzen gemacht.
	<br /><br /><a href="start.php">noch eine Lektion machen</a></div>

	

	<?php
		if (! @in_array('undone', $_SESSION['s_rf']))
			$sql = "UPDATE userdata SET lektion=". ($_SESSION['s_lektion'] + 1) ." WHERE username='".$_SESSION['username']."' AND lektion=".$_SESSION['s_lektion'];
		@mysql_query($sql);
		$s_rf = '';
		$s_lektion = '';
		$s_fehler = 0;
	?>



</body>
</html>