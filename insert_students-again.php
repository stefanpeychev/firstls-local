<?php
	// Изтриване на напусналите ученици
	include '../../add_files/config.php';
	
	$students = fopen("students122017-1.txt", "r") or die("Error!");
	
	$br = 0;
	while (!feof($students))
		{
			// За всяко име в БД четем имената от файла последователно...
			$student = fgets($students, 255);
						
			$ex = explode (" ", $student);
			$upd = mysql_query("INSERT INTO fls1egvn_students (student_nr, class, marker, name, surname, family) VALUES (0, \"$ex[1]\", $ex[2], \"$ex[3]\", \"$ex[4]\", \"$ex[5]\") ") or die(mysql_error());
			
			if ($upd)
			{
				echo ("$ex[1] $ex[2] $ex[3] $ex[4] $ex[5]");
				$br++;
			}
			
		}
	echo $br."<br />";
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
