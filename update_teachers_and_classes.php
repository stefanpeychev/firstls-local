<?php
	// ВСЕКИ УЧИТЕЛ ДА СИ ПРОВЕРИ КЛАСОВЕТЕ
	// ВЪЗМОЖНО Е НЕЩО ДА НЕ РАБОТИ
	// ПО ОЧАКВАНИЯ НАЧИН !!!
	// Разпределение на класовете по учители и учебни предмети
	// Прави се в началото на всяка учебна година
	include '../../add_files/config.php';
		
	$teachers = fopen("teachers-s.txt", "r") or die("Error!");
	$vipusk = array(0, 8, 9, 10, 11, 12);
	$paralelka = array('x', 'а', 'б', 'в', 'г', 'д', 'е', 'ж', 'з', 'и');
	$i=1;
	$plan = array('eightAE', 'nineAE', 'tenAE', 'elevenAE', 'twelveAE', 'eightNE', 'nineNE', 'tenNE', 'elevenNE', 'twelveNE');
	
	// Зануляваме таблицата преди да запишем новата информация
	$empty_table = mysql_query("TRUNCATE TABLE fls1egvn_teacher_subject_class");
	
			$select_subject = mysql_query("SELECT * FROM fls1egvn_subjects");
			while ($sub = mysql_fetch_array($select_subject))
			{
				// За всеки учебен предмет избираме учителите, които го преподават
				$sub_nr = $sub['subject_nr'];
				$subject_name = $sub['subject'];
				$select_number = mysql_query("SELECT nr, t_nr FROM fls1egvn_teacher_subject WHERE subject_nr = $sub_nr ");
				while($number = mysql_fetch_array($select_number))
				{
					$nr = $number['nr'];
					try {
					$select_teacher = mysql_fetch_array(mysql_query("SELECT t_name FROM fls1egvn_teachers WHERE t_nr = $number[t_nr] AND status <> 3"));
																				//or die(mysql_error());
																				
					
						} catch (Exception $e) {
						  echo $e->getMessage();
						  echo "---";
						  echo mysql_error();
						}
																				
					$teacher_name = $select_teacher['t_name'];
					while (!feof($teachers))
					{
						// За всеки учител, който преподава съответния предмет
						// претърсваме файла
						$teacher = fgets($teachers, 3500);
						$file_teacher = NULL;
						if (preg_match("/$teacher_name/", "$teacher") AND preg_match("/$subject_name/", "$teacher")) {$file_teacher = $teacher;
									break;};
						
					}
					fseek($teachers, 0, SEEK_SET);
					
					if ($file_teacher!=NULL)
					{
						for ($v = 1; $v < 6; $v++)
							for ($par = 1; $par < 10; $par++)
							{	
								// За паралелките с НЕ след 9 клас пропускаме НЕ като Първи чужд език
								// Той се добавя отделно като special_subject
								if ((($v == 1) && ($par == 1 || $par == 2 || $par == 3 || $par == 4 || $par == 5)) && ($sub_nr == 3 || $sub_nr == 4 || $sub_nr == 5)
									|| (($v == 1) && ($par == 6 || $par == 7 || $par == 8 || $par == 9)) && ($sub_nr == 2 || $sub_nr == 4 || $sub_nr == 5)
									|| (($v != 1) && ($par == 1 || $par == 2 || $par == 3 || $par == 4 || $par == 5)) && ($sub_nr == 3 || $sub_nr == 4)
									|| (($v != 1) && ($par == 6 || $par == 7 || $par == 8 || $par == 9)) && ($sub_nr == 2 || $sub_nr == 5))
									continue;
								
								// Във всички останали случаи
								// Извличаме номера на текущия клас
								$current_class = $vipusk[$v].$paralelka[$par];
								$class_number = mysql_fetch_array(mysql_query("SELECT class_nr FROM fls1egvn_classes WHERE class = \"$current_class\" "));
								$class_insert = $current_class." кл. ";
								//echo $class_insert."<br />";
								// и търсим кой учител преподава текущия предмет в този клас
								if (preg_match("/$class_insert/", "$file_teacher") && $teacher_name!== NULL)
								{
									// щом го намерим добавяме информацията в съответната таблица
									$insert_info = mysql_query("INSERT INTO fls1egvn_teacher_subject_class (nr, t_s_nr, class_nr, student_nr)
																	VALUES (0, $nr, $class_number[class_nr], 0) " );
									// При успешно добавяне извеждаме подходяща информация
									if ($insert_info) echo ("$i $current_class $subject_name $teacher_name <br />");
									$i++;
								}
													
							}
					}
						
				}
			
			}
		
	fclose($teachers);
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
