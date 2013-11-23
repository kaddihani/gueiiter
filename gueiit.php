<?php
    require_once('connect_db.php');
	
	//$thistime;
	$query = sprintf('INSERT INTO `timeline` (`nama`, `email`, `pesan`) VALUES ("%s", "%s", "%s");', $_POST['gname'], $_POST['email'], $_POST['pesan']);
	$result = mysql_query($query, $gueiiter_db);
	exit;
	header('view.php');
?>