<?php
	// Изтрива се информация в някои таблици
	// Информацията се изтрива в края на всяка учебна година
	// СЛЕД ЗАДЪЛЖИТЕЛНО АРХИВИРАНЕ!!!
	// и по желание в края на първи срок
	// Целта е подготовка на БД за следващ период
	include '../../add_files/config.php';
	
	$trunc_grades = mysql_query("TRUNCATE TABLE fls1egvn_grades");
	$trunc_punished_students = mysql_query("TRUNCATE TABLE fls1egvn_punished_students");
	$trunc_report = mysql_query("TRUNCATE TABLE fls1egvn_report");
	$trunc_spravki = mysql_query("TRUNCATE TABLE fls1egvn_spravki");
	$trunc_missings = mysql_query("TRUNCATE TABLE fls1egvn_missings");
	$update_month_table = mysql_query("UPDATE fls1egvn_month SET flag=0");
	$update_classes = mysql_query("UPDATE fls1egvn_classes SET neizv1=0, parts1=0, izv1=0, neizv2=0, parts2=0, izv2=0");
	
	if ($trunc_grades && $trunc_punished_students && $trunc_report && $trunc_spravki && $trunc_missings && $update_month_table)
		echo "Update finished successfully!";
	else
		echo "Sth went wrong!";
		
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
