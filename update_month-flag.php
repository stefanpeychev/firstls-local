<?php
	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	
	
				$insert_new = mysql_query("UPDATE fls1egvn_month SET flag = 1 WHERE month = \"dec\" ") or die(mysql_error()); 
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
