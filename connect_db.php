<?php
    $gueiiter_db = mysql_connect('localhost', 'gueiiter', 'gueiiter1234');
	
	if(!$gueiiter_db){
		echo "Oops... koneksi gagal";
		exit;
	}
	
	if(!mysql_select_db('gueiiter')){
		echo "Oops... koneksi ke database timeline gagal";
		exit;
	}
?>