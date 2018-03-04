<?php
	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	
	// Избираме всички ученици в БД и ги съхраняваме в масив
	$select_student = mysql_query("SELECT * FROM fls1egvn_students ");
	$stud = array();
	$check1 = true;
	while ($st = mysql_fetch_array($select_student))
	{
		$insert_miss = mysql_query("INSERT INTO fls1egvn_missings (nr, student_nr, current_w, current_h, current_p)
										VALUES (0, $st[student_nr], 0, 0, 0) ");
	
		if (!$insert_miss) $check1 = false;
	}
	
	
	
	echo ("<h3>Въвеждане на отсъствия</h3><br />");
		
	if ($check1) echo ("Отсъствията бяха въведени успешно!");
			else echo("Sth went wrong!");
?>
