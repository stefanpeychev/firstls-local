<?php

	include '../../add_files/config.php';
	

	$classess = array("8а","8б","8в","8г","8д","8е","8ж","8з","8и",
						"9а","9б","9в","9г","9д","9е","9ж","9з","9и",
						"10а","10б","10в","10г","10д","10е","10ж","10з","10и",
						"11а","11б","11в","11г","11д","11е","11ж","11з","11и",
						"12а","12б","12в","12г","12д","12е","12ж","12з","12и",
						);
	
// Извличаме имената и номерата на всички учители в БД
	// и ги съхраняваме в масив $leaders
	$select_teacher = mysql_query("SELECT t_nr, t_name FROM fls1egvn_teachers");
	$leaders = array();
	while ($teach = mysql_fetch_array($select_teacher))
	{
		$leaders[] = $teach;
	}

	$teachers = fopen("teachers-s.txt", "r") or die("Error!");
	$class_nr = 0;
	$leader = "";
	
	// За всеки клас последователно създаваме променлива с
	// текста "клас" кл Час на - 
	for ($j = 0; $j<45; $j++)
	{
		$class_l = $classess[$j]." кл. Час на";
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
			} else echo "wrong1<br />";
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
				
			} else echo "wrong2<br />";
				
			
		
		
		
	}
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
	?>