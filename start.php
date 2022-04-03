<?php
	include ('common.inc.php');

	session_register('username', 's_lektion', 's_satz', 's_rf', 's_fehler');
	$username = "lea";
	$s_satz = 1;
?>

<html>
<head>
    <title>Tippen Lernen mit 10 Fingern</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>


	<h1>Lektion auswählen</h1>

	<div style="margin-left: 100px; padding-bottom: 20px; width: 70%">Wähle eine der freigeschalteten Lektionen aus, indem du auf das <img src="jump.gif" /> davor klickst. Die <span style="background-color: #CCC">graue</span> Lektion ist die höchste, die Du noch nicht geschafft hast.</div>

	<table class="lektionen" cellpadding=0 cellspacing=0>
	<?php

		$sql = "SELECT lektion FROM userdata WHERE username='" . $_SESSION['username'] . "'";
		$erg = mysql_query($sql);
		$zeile = mysql_fetch_array($erg);
		$akt_lektion = $zeile['lektion'];

        $sql = "SELECT * FROM lektionen WHERE 1 ORDER BY id ASC";
        $erg = mysql_query($sql);

        while ($zeile = mysql_fetch_array($erg))
    	{

    		if ($zeile['id'] < $akt_lektion)
            	echo '<tr><td width="30"><a href="lektion_start.php?id='.$zeile['id'].'"><img src="jump.gif" border="0" /></a></td><td width="40" align="right" style="padding-right: 15px"><strong>' . $zeile['id'] . '</strong></td><td>' . $zeile['titel'] . '</td><td><span class="lektion_bemerkungen">' . $zeile['bemerkung'] . ' </span></td></tr>';
            elseif ($zeile['id'] == $akt_lektion)
            	echo '<tr><td class="lektion_akt" width="30"><a href="lektion_start.php?id='.$zeile['id'].'"><img src="jump.gif" border="0" /></a></td><td class="lektion_akt" width="40" align="right" style="padding-right: 15px"><strong>' . $zeile['id'] . '</strong></td><td class="lektion_akt">' . $zeile['titel'] . '</td><td class="lektion_akt"><span class="lektion_bemerkungen">' . $zeile['bemerkung'] . ' </span></td></tr>';
	       elseif ($zeile['id'] > $akt_lektion)
            	echo '<tr><td class="lektion_notfree" width="30"></td><td class="lektion_notfree" width="40" align="right" style="padding-right: 15px"><strong>' . $zeile['id'] . '</strong></td><td class="lektion_notfree">' . $zeile['titel'] . '</td><td><span class="lektion_bemerkungen">' . $zeile['bemerkung'] . ' </span></td></tr>';
        }
    ?>
    </table>



</body>
</html>