<?php
	// Въвеждане на седмично разписание
	include '../../add_files/config.php';
	
	
	// Избираме всички учители в БД и ги съхраняваме в масив
	$select_teacher = mysql_query("SELECT * FROM fls1egvn_teachers WHERE status <> 3");
	$teach = array();
	
	while ($st = mysql_fetch_array($select_teacher))
		$teach[] = $st;
	
	$sedra = fopen("sedra1.txt", "r") or die("Error!");
	
	
	// Избираме всички класове в БД
	/*$select_class = mysql_query("SELECT * FROM fls1egvn_classes ");
	while ($cl = mysql_fetch_array($select_class))
		$class[] = $cl;*/
	
	echo ("<p><h3>Въвеждане на програма</h3></p>");
	//mysql_data_seek($select_student, 0) or die(mysql_error());
	foreach ($teach as $teach1)//while ($st = mysql_fetch_array($select_student))
	{
		$teacher_nr = $teach1['t_nr'];
		while (!feof($sedra))
		{
			// За всяко име в БД четем имената от файла последователно...
			$teacher_sedra = fgets($sedra, 255);
			
			$t_info = explode (";", $teacher_sedra);
			
			$t_name1 = explode (" ", $t_info[0]);
			
			$check = preg_match("/$t_name1[0]/", "$teach1[t_name]");
			
			// Ако сме намерили името....
			if ($check)
			{
				//echo $t_name1[0]."<br />";
				// проверяваме и фамилията и ако и двете съвпадат въвеждаме учителя в БД
				if (preg_match("/$t_name1[1]/", "$teach1[t_name]"))
				{
							
								echo $t_name1[0]." ".$t_name1[1]."<br />";
								$insert_sedra = mysql_query("INSERT INTO fls1egvn_sedra (nr, teacher_nr, m1, m2, m3, m4, m5, m6, m7, m8,
								t1,  t2, t3, t4, t5, t6, t7, t8,
								w1, w2, w3, w4, w5,w6, w7, w8,
								th1, th2, th3, th4, th5, th6, th7, th8,
								f1, f2, f3, f4, f5, f6, f7, f8)
								VALUES (0, $teacher_nr, '$t_info[1]', '$t_info[2]', '$t_info[3]', '$t_info[4]', '$t_info[5]', '$t_info[6]', '$t_info[7]', '$t_info[8]', 
								'$t_info[10]', '$t_info[11]', '$t_info[12]', '$t_info[13]', '$t_info[14]', '$t_info[15]', '$t_info[16]', '$t_info[17]', 
								'$t_info[19]', '$t_info[20]', '$t_info[21]', '$t_info[22]', '$t_info[23]', '$t_info[24]', '$t_info[25]', '$t_info[26]', 
								'$t_info[28]', '$t_info[29]', '$t_info[30]', '$t_info[31]', '$t_info[32]', '$t_info[33]', '$t_info[34]', '$t_info[35]', 
								'$t_info[37]', '$t_info[38]', '$t_info[39]', '$t_info[40]', '$t_info[41]', '$t_info[42]', '$t_info[43]', '$t_info[44]') ")
								or die(mysql_error());
							
								break;
				}
			}
			else continue;
		}
		
		fseek($sedra, 0, SEEK_SET);
	}
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
