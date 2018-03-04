<?php
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	for ($i = 1; $i <= 1188; $i++)
	{
		$ins = mysql_query("INSERT INTO fls1egvn_missings (nr, student_nr) VALUES (0, $i)") or die(mysql_error());
	}
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
