<?php
	// Проверка за дублирани учители в базата данни??? Провери дали работи!!!
	include '../../add_files/config.php';
	
	
	
	$select_teacher = mysql_query("SELECT t_name, COUNT(status) FROM fls1egvn_teachers GROUP BY status HAVING ( COUNT(status) < 1 ) ");
	while ($teacher = mysql_fetch_array($select_teacher))
	{
		echo $teacher['t_name']."<br />";
	}
?>
