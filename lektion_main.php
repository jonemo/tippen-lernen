<?php
	include ('common.inc.php');
	if ( !in_array('undone', $_SESSION['s_rf']) AND !in_array('falsch', $_SESSION['s_rf']))
		header("Location: lektion_fertig.php");
?>
<html>
<head>
    <title>Tippen Lernen mit 10 Fingern</title>
    <link rel="stylesheet" href="style.css" />
    <script language="JavaScript" type="text/javascript">

		function buchstabe(wert)
		{
			var soll = document.getElementById('soll').innerHTML;
			var laenge = wert.length;

			if ( soll.substring(0, laenge) != wert )
			{
				document.getElementById('rahmen').style.borderColor = 'red';
				document.formular.richtig.value = 'falsch';
				document.formular.submit();
			}

			if ( soll == wert)
				document.formular.submit();

		}

    </script>
</head>

<body>
<?php

	// LEKTIONSINFOS aus der Datenbank abfragen
	$sql = "SELECT * FROM lektionen WHERE id=" . $_SESSION['s_lektion'];
	$erg = mysql_query($sql);
	$lektion = mysql_fetch_array($erg);

	$sql = "SELECT * FROM inhalte WHERE lektion=" . $_SESSION['s_lektion'] . " ORDER BY id ASC";
	$erg = mysql_query($sql);
?>

	<h1><?php echo $lektion['titel'] ?></h1>

	<div>
	<form name="formular" action="rf.php" method="POST">

<?php

	$variable = FALSE;

	while ($zeile = mysql_fetch_array($erg))
	{

		if ($zeile['id'] > $_SESSION['s_satz'] AND $variable == FALSE)
		{
			echo '<div style="margin-left: 20px;">
                    <div style="font-size: smaller"><strong>Zu tippen ist:</strong></div>
                    <div class="satz_todo" id="soll">' . $zeile['satz'] . '</div>

                    <div style="margin-left: 3px; margin-top: 10px; margin-bottom: 10px; border-style: solid; border-width: 1px; border-color: green; padding: 5px;" id="rahmen">
                        <input type="text" name="tip" style="font-family: Courier; font-size: 14px; letter-spacing: 3px; width: 97%; border: none;" onKeyUp="buchstabe(this.value)" />
                    </div>
                    <input type="hidden" name="last_satz_id" value="' . $zeile['id'] . '" />
				</div>';

			$variable = TRUE;

			$last_satz = $zeile['id'];
		}

		else // wenn die ID nicht der aktuelle Satz ist
		{
			$array = $_SESSION['s_rf'];

			if ($array[$zeile['id']] == "richtig") //wenn die Zeile schon einmal geschr. wurde
				echo '<div class="satz_richtig"><a href="jumpto.php?lektion='.$_SESSION['s_lektion'].'&satz='.$zeile['id'].'"><img src="jump.gif" border="0" /></a>&nbsp;&nbsp;&nbsp;' . $zeile['satz'] . '</div>';
			elseif ($array[$zeile['id']] == "falsch")  //wenn die Zeile schon einmal geschr. wurde
				echo '<div class="satz_falsch"><a href="jumpto.php?lektion='.$_SESSION['s_lektion'].'&satz='.$zeile['id'].'"><img src="jump.gif" border="0" /></a>&nbsp;&nbsp;&nbsp;' . $zeile['satz'] . '</div>';
			else
			{										   // wenn die Zeile noch nicht geschr. wurde
				echo '<div class="satz_todo"><a href="jumpto.php?lektion='.$_SESSION['s_lektion'].'&satz='.$zeile['id'].'"><img src="jump.gif" border="0" /></a>&nbsp;&nbsp;&nbsp;' . $zeile['satz'] . '</div>';
			}
		}
	} // ende vom WHILE

?>


		<input type="hidden" name="lektion" value="<?php echo $get_lektion ?>" />
		<input type="hidden" name="richtig" value="richtig" />
	</form>
	</div>

	<a class="to_ov" href="lektion_fertig.php">Lektion abbrechen</a>

    <script language="JavaScript" type="text/javascript">

    if(document.forms.formular && document.forms.formular.tip) {
        document.forms.formular.tip.focus();
    }

	</script>
</body>
</html>
<?php
	$s_satz = $last_satz;
?>