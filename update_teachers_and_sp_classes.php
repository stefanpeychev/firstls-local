<?php

	include '../../add_files/config.php';


	$classess = array("8а","8б","8в","8г","8д","8е","8ж","8з","8и",
						"9а","9б","9в","9г","9д","9е","9ж","9з","9и",
						"10а","10б","10в","10г","10д","10е","10ж","10з","10и",
						"11а","11б","11в","11г","11д","11е","11ж","11з","11и",
						"12а","12б","12в","12г","12д","12е","12ж","12з","12и",
						);
	$trunc_table1 = mysql_query("TRUNCATE TABLE fls1egvn_teacher_sp_subject");
	$trunc_table2 = mysql_query("TRUNCATE TABLE fls1egvn_teacher_sp_subject_class");
	
	$teachers = fopen("teachers-special_subjects.txt", "r") or die("Error!");
	
	while (!feof($teachers))
	{
		$info = fgets($teachers, 1000);
		$information = explode (",", $info);
		$size = count($information);
		//echo $info." ";
		$t_nr = mysql_fetch_array(mysql_query("SELECT t_nr FROM fls1egvn_teachers WHERE t_name = \"$information[0]\" "));
		//echo isset($t_nr['t_nr']);
		$sub_nr = mysql_fetch_array(mysql_query("SELECT subject_nr FROM fls1egvn_special_subjects WHERE subject = \"$information[1]\" "));
		echo $information[0]." ".$sub_nr['subject_nr']." ".$information[1]."<br />";
		//echo is_numeric($t_nr['t_nr']);
		$insert_first = mysql_query("INSERT INTO fls1egvn_teacher_sp_subject (nr, t_nr, subject_nr) VALUES (0, $t_nr[t_nr], $sub_nr[subject_nr]) ");
		
		if ($insert_first)
		{
			$new_nr = mysql_fetch_array(mysql_query("SELECT nr FROM fls1egvn_teacher_sp_subject WHERE t_nr = $t_nr[t_nr] AND subject_nr = $sub_nr[subject_nr]"));
			
			for ($i = 2; $i < $size; $i++)
			{
				$class = explode(" ",$information[$i]);
				$class_nr = mysql_fetch_array(mysql_query("SELECT class_nr FROM fls1egvn_classes WHERE class = \"$class[0]\" "));
				
				$insert_second = mysql_query("INSERT INTO fls1egvn_teacher_sp_subject_class (nr, t_s_nr, class_nr, student_nr)
												VALUES (0, $new_nr[nr], $class_nr[class_nr], $class[1])");
				
				if ($insert_second) echo ($class[0]." ".$information[1]." ".$class[1]."<br />");
					else echo ("Fail1!<br />");
			}
		
		}
		else echo ("Fail!<br />");
	
	
	}

	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
	
	?>