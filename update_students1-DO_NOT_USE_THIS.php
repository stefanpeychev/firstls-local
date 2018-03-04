<?php
	// Променя броя на учениците във всеки клас
	// Определя класните ръководители
	// Да се разделят в отделни файлове !!!
	// за да може да се актуализира броя ученици в клас
	// след прибавяне или изтриване на придошли и напуснали
	include '../add_files/config.php';
	
	
	$classess = array("8а","8б","8в","8г","8д","8е","8ж","8з","8и",
						"9а","9б","9в","9г","9д","9е","9ж","9з","9и",
						"10а","10б","10в","10г","10д","10е","10ж","10з","10и",
						"11а","11б","11в","11г","11д","11е","11ж","11з","11и",
						"12а","12б","12в","12г","12д","12е","12ж","12з","12и",
						);
	$sum = 0;
	for ($i=0; $i<45; $i++)
	{	
		// Извличаме последователно броя ученици за всеки клас
		$broi = mysql_query("SELECT COUNT(class) AS broi FROM fls1egvn_students WHERE class=\"$classess[$i]\" ");
		$br = mysql_fetch_array($broi);
		
		// Обновяват се таблиците с новата стойност
		$update_student_number = mysql_query("UPDATE fls1egvn_classes SET student_number = $br[broi] WHERE class_nr = $i + 1");
		$update_student_number1 = mysql_query("UPDATE fls1egvn_teacher_subject_class SET student_nr = $br[broi] WHERE class_nr = $i + 1");
		
		// При успешно обновяване на броя ученици се извежда класа и съответния брой
		// Броя ученици се добавя към общия брой ученици в училище за справка
		if ($update_student_number && $update_student_number1)
		{
			echo ("$classess[$i] - $br[broi]<br />");
			$sum += $br['broi'];
		}
	}
	
	echo $sum;
	
	// Извличаме имената и номерата на всички учители в БД
	// и ги съхраняваме в масив $leaders
	$select_teacher = mysql_query("SELECT t_nr, t_name FROM fls1egvn_teachers");
	$leaders = array();
	while ($teach = mysql_fetch_array($select_teacher))
	{
		$leaders[] = $teach;
	}

	$teachers = fopen("teachers.txt", "r") or die("Error!");
	$class_nr = 0;
	$leader = "";
	
	// За всеки клас последователно създаваме променлива с
	// текста "клас" кл Час на - 
	for ($j = 0; $j<45; $j++)
	{
		$class_l = $classess[$j]." кл Час на";
		$check = FALSE;
		
		// Извличаме имената на учителите от файла
		while (!feof($teachers))
		{			
			//Четем име от файла
			$teacher = fgets($teachers, 3500);
			
			// Проверяваме дали съдържа текста за текущия клас
			// Това означава, че учителя е класен на съответния клас
			if (preg_match("/$class_l/", "$teacher"))
			{
				$check = TRUE;
				$class_nr = $j + 1;
				$leader = $teacher;
				break;
			}
		}
		fseek($teachers, 0, SEEK_SET);
		
		if ($check)
		{
			
			foreach($leaders as $teach)
			{
				// Намираме името и номера на класния ръководител
				// и обновяваме БД с новите стойности
				if (preg_match("/$teach[t_name]/", "$leader"))
					{
						$update_leader = mysql_query("UPDATE fls1egvn_classes SET class_leader = $teach[t_nr] WHERE class_nr = $class_nr");
						$cl = $class_nr-1;
						if ($update_leader) echo ("$classess[$cl] was updated successfully!<br />");
							else echo "Sth went wrong!<br />";
						
						break;
					}
				}
				
			}
				
			
		
		
		
	}
?>
