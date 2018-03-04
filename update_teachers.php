<?php
	// Добавяне на придошли учители
	// На напусналите или пенсионираните се задава статус 3
	
	include '../../add_files/config.php';
		
	// Избираме всички учители в БД	
	$select_teacher = mysql_query("SELECT * FROM fls1egvn_teachers ");
	
	// Избираме учебните предмети в БД
	$select_subjects = mysql_query("SELECT * FROM fls1egvn_subjects ");
	
	// Отваряме файла от admin
	$teachers = fopen("teachers2017.txt", "r") or die("Error!");
	
	// Създаваме файл за съхраняване на имената и ключа за новите учители
	$new_teachers = fopen("new_teachers.txt", "w+") or die("Error!");
	
	echo ("<h3>Придошли</h3><br />");$i=0;
	while (!feof($teachers))
	{
		// Четем ред от файла
		$teacher = fgets($teachers, 3500);
		
		// За всяко име в БД проверяваме дали се съдържа в прочетения ред
		while ($st = mysql_fetch_array($select_teacher))
		{
			$st1 = $st['t_name'];
			$check = preg_match("/$st1/", "$teacher");
			if ($check) {
				break;
			}
		}
		
		// Ако името от прочетения ред го няма в БД го добавяме
		if (!$check) 
		{	
			if ($teacher != NULL ) 
			{
				$i++;
				$t_n = explode(" ", $teacher);
				$name = $t_n[0]." ".$t_n[1]." ".$t_n[2];
								
				$select_egn = mysql_query("SELECT egn FROM fls1egvn_teachers ");
				
				// Изчисляваме случайно число и го задаваме за ключ на новия учител
				$k = rand(40045, 100000);
				$nr = md5(md5(($k + $i*$i)%40045));
				$nr1 = ($k + $i*$i)%40045;
				
				// Обновяваме БД с новата информация
				$insert_teacher = mysql_query("INSERT INTO fls1egvn_teachers (t_nr, egn, t_name, status) VALUES (0, \"$nr\", \"$name\", 0) ") 
					or die(mysql_error());
					
				// Ако обновяването е минало добре
				if ($insert_teacher) 
				{
					// служебна променлива за проследяване на успешното актуализиране на БД
					$check_nr_sub = false;
					
					// Избираме номера на новодобавения учител
					$select_new = mysql_query("SELECT t_nr FROM fls1egvn_teachers WHERE t_name = \"$name\" ");
					$new_nr = mysql_fetch_array($select_new);
					$number = $new_nr['t_nr'];
					
					
					while ($subject = mysql_fetch_array($select_subjects))
					{
						// За всеки учебен предмет в БД
						// проверяваме дали се съдържа в прочетения от файла с учителите ред
						$check_sub = preg_match("/$subject[subject]/", "$teacher");
						
							if ($check_sub)
						{
							// Щом намерим съответния предмет обновяваме таблицата с връзки между
							// учители и учебни предмети
							$insert_new = mysql_query("INSERT INTO fls1egvn_teacher_subject (nr, t_nr, subject_nr) VALUES (0, $number, $subject[subject_nr]) ")
								or die(mysql_error());
							if ($insert_new) $check_nr_sub = true;
						}	
					}
					mysql_data_seek($select_subjects, 0);
					
					// Ако добавянето на съответния учител е преминало успешно
					// извеждаме подходяща информация
					if ($check_nr_sub) echo ($name." беше добавен успешно! Неговият ПИК е: ".$nr1."<br />");
						else echo ($name."Sth went wrong!<br />");
					
					
				}
				$new = "$name $nr1\n";
				
				// Записваме името и ПИК на добавения учител във файл
				// за да го предоставим за регистрация
				fwrite($new_teachers, $new);
				
			}
		}
		mysql_data_seek($select_teacher, 0);
	}
	fclose($new_teachers);
	
	fseek($teachers, 0, SEEK_SET);
	
	echo ("<p><h3>Напуснали</h3></p>");
	mysql_data_seek($select_teacher, 0);
	
	// За всяко име на учител в БД
	// претърсваме файла с учителите
	// Ако не го намерим
	// променяме статуса на този учител на 3
	
	// ПОМИСЛИ КАК ДА ЗАБРАНИШ ДОСТЪП ДО СИСТЕМАТА НА ТОЗИ УЧИТЕЛ!!!
	while ($st = mysql_fetch_array($select_teacher))
	{
		$st1 = $st['t_name'];
		while (!feof($teachers))
		{
			$teacher = fgets($teachers, 3500);
			$check = preg_match("/$st1/", "$teacher");
			if ($check) break;
		}
		if (!$check) 
			$update_status = mysql_query("UPDATE fls1egvn_teachers SET status = 3 WHERE t_nr = \"$st[t_nr]\" ")	or die(mysql_error());
		fseek($teachers, 0, SEEK_SET);
	}
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
