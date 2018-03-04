<?php
	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	
	// Избираме всички ученици в БД и ги съхраняваме в масив
	$select_student = mysql_query("SELECT * FROM fls1egvn_students ");
	$stud = array();
	
	while ($st = mysql_fetch_array($select_student))
		$stud[] = $st;
	
	$students = fopen("students-names.txt", "r") or die("Error!");
	
	echo ("<h3>Придошли</h3><br />");
	while (!feof($students))
	{
		$check = FALSE;
		//Четем име от файла
		$student = fgets($students, 255);
		foreach ($stud as $st)//while ($st = mysql_fetch_array($select_student))
		{
			$st1 = $st['name']. " ". $st['surname']. " ".$st['family'];
			//За всяко име от БД проверяваме дали съвпада с прочетеното от файла
			$check = preg_match("/$st1/", "$student");
			if ($check) break;
		}
		// Ако не сме намерили дадено име го добавяме в БД
		if (!$check) 
		{
			if ($student != NULL ) 
			{
				$ex = explode (" ", $student);
				/*echo $student."<br />";
				echo $ex[0]." ".$ex[1]." ".$ex[2]." ".$ex[3]." ".$ex[4];*/
				$insert_new = mysql_query("INSERT INTO fls1egvn_students (student_nr, class, marker, name, surname, family) VALUES (0, \"$ex[0]\", 0,  
					\"$ex[1]\", \"$ex[2]\", \"$ex[3]\") ") or die(mysql_error()); 
			}
		}
		
	}
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
