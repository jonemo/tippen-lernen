<?php
	$s_rf[$_SESSION['s_satz']] = 'falsch';
	$s_fehler++;
?>

<html>
<head>
    <title>Tippen Lernen mit 10 Fingern</title>
	<meta http-equiv="refresh" content="2; URL=lektion_main.php" />
</head>

<body>

        <div style="position: absolute; top: 90px; width: 100%; text-align: center; font-size: 400; font-weight: bolder; color: #D0D0D0"><?php echo $_SESSION['s_fehler'] ?></div>
    
    <table style="position: absolute; top: 250px; width: 100%; margin: 0; border: none; border-top: 3px solid red; border-bottom: 3px solid red; padding: 0;">
    	<tr><td style="margin: 0; text-align: center; padding: 20px;"><div style="font-size: 60px;">FALSCH</div></td></tr>
    </table>

</body>
</html>