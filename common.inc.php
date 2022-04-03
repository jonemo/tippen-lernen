<?php
	mysql_connect("localhost", "geheim", "geheim")
		or die ("<b>Ausnahme - Fehler</b><br />Die Datenbank scheint nicht online zu sein.");
	mysql_select_db("tippen");

	extract($_GET, EXTR_PREFIX_ALL, "get");
    extract($_POST, EXTR_PREFIX_ALL, "post");
    
    session_start();
?>
