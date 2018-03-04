<?php
	ini_set('max_execution_time', 300); //300 seconds = 5 minutes
	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	
	// Избираме всички ученици в БД и ги съхраняваме в масив
	$select_student = mysql_query("SELECT * FROM fls1egvn_students ");
	$stud = array();
	$check1 = true;
	
	while ($st = mysql_fetch_array($select_student))
		$stud[] = $st;
	
	//strpos($a, 'are')
	
	$miss = fopen("ots12-1.txt", "r") or die("Error!");
	echo count($stud)."<br />";
	$br = 0;
	foreach ($stud as $st)
	{
		$st1 = $st['class']." ".$st['name']." ".$st['surname']." ".$st['family'];
		$cl = $st['class'];
		$student_nr = $st['student_nr'];
		
		while (!feof($miss))
		{
			// За всяко име в БД четем имената от файла последователно...
			$student = fgets($miss, 255);
			// и ги сравняваме
			$ex = explode (" ", $student);
				$string1 = trim($ex[1]);
				$string2 = trim($ex[2]);
				$string3 = trim($ex[3]);
				$string4 = trim($st['family']);
				if (strcmp($ex[0],$st['class']) == 0)
					if (strcmp($string1,$st['name']) == 0)
						if (strcmp($string2,$st['surname']) == 0)
							if (strcmp($string3,$string4) == 0)
				{
					//$ex = explode (" ", $student);
					echo ($student_nr." ". $st1." ".$cl." ".$ex[4]." ".$ex[5]." ".$ex[6]." ".$ex[7]." ".$ex[8]." ".$ex[9]); echo("<br />");
					$update_miss = mysql_query("UPDATE fls1egvn_missings SET current_w = $ex[4], current_h = $ex[5], current_p = $ex[6] WHERE student_nr = $student_nr ") or die(mysql_error());
					$insert_miss = mysql_query("UPDATE fls1egvn_missings SET dec_w = $ex[7], dec_h = $ex[8], dec_p = $ex[9] WHERE student_nr = $student_nr ") or die(mysql_error());
					$br++;
				
				}
			else continue;
			
		}
		fseek($miss, 0, SEEK_SET);
	}
	echo $br."<br />";
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
