<?php

	include '../add_files/config.php';
	
	
	
	$select_student = mysql_query("SELECT * FROM fls1egvn_students ");
	$stud = array();
	
	while ($st = mysql_fetch_array($select_student))
		$stud[] = $st;
	
	$students = fopen("uchenici_17.09.2015.txt", "r") or die("Error!");
	
	/*echo ("<h3>Придошли</h3><br />");
	while (!feof($students))
	{$check = FALSE;
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
				$insert_new = mysql_query("INSERT INTO fls1egvn_students (student_nr, class, name, surname, family) VALUES (0, \"$ex[0]\", \"$ex[1]\", 
					\"$ex[2]\", \"$ex[3]\") ") or die(mysql_error()); 
			}
		}
		//mysql_data_seek($select_student, 0);
	}*/
	echo ("<p><h3>Напуснали</h3></p>");
	//mysql_data_seek($select_student, 0) or die(mysql_error());
	foreach ($stud as $st)//while ($st = mysql_fetch_array($select_student))
	{
		$st1 = $st['name']. " ". $st['surname']. " ".$st['family'];
		$cl = $st['class'];
		$student_nr = $st['student_nr'];
		while (!feof($students))
		{
			// За всяко име в БД четем имената от файла последователно...
			$student = fgets($students, 255);
			// и ги сравняваме
			$check = preg_match("/$st1/", "$student");
			/*if ($student_nr == 1)
			{
				echo $student."<br />";
				echo $st1."<br />";
				echo $check."<br />";
			}*/
			// Ако сме намерили името проверяваме класа
			if ($check)
			{
				// Ако класа не съвпада (ученика е останал в същия клас) обновяваме стойността за клас в БД с тази от файла
				if (!preg_match("/$cl/", "$student"))
							{
								$ex = explode (" ", $student);
								$upd = mysql_query("UPDATE fls1egvn_students SET class = \"$ex[0]\" WHERE student_nr = $student_nr ") or die(mysql_error());
							}
				break;
			}
			else continue;	
		}
		// Ако името не е намерено във файла значи ученика е напуснал училище и го изтриваме от БД
		if (!$check) 
		{
			$delete_old = mysql_query("DELETE FROM fls1egvn_students WHERE class = \"$st[class]\" AND name = \"$st[name]\"
				AND surname = \"$st[surname]\" AND family = \"$st[family]\" ")	or die(mysql_error());
			//echo ("$st[class] $st[name] $st[surname] $st[family]<br />");
		}
		fseek($students, 0, SEEK_SET);
	}
	echo ("Update finished!");
?>
