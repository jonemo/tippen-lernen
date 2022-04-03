<?php
	include ('common.inc.php');

	if ($post_richtig == 'richtig')
	   include('richtig.inc.php');
   	else
	   include('falsch.inc.php');
?>