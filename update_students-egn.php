<?php
/*function comp_str($str1, $str2)
{
	if(strlen($str1) != strlen($str2)) {
		echo "<p>Lengths are different!<br />";
		echo $str1." length is ".strlen($str1)."<br />";
		echo $str2." length is ".strlen($str2)."<br />";
		/*for ($s = 0; $s < strlen($str1); $s++)
			echo $s." ".$str1[$s]."<br />";
		for ($s = 0; $s < strlen($str2); $s++)
			echo $s." ".$str2[$s]."<br />";
		echo "</p>";
	} else {
		for($i=0; $i < strlen($str1); $i++) {
			if(ord($str1[$i]) != ord($str2[$i])) {
				echo "Character $i is different! str1: " . ord($str1[$i]) . ", str2: " . ord($str2[$i]);
				break;
			}
		}
	}
}*/

function transform_egn($egn)
{
	$k = 0;$i = 0;
	while ($egn[$i] == 0)
	{
		if ($egn[$i] == 0) $k++;
		$i++;
	}
	
	$new_egn = substr($egn, $k);
	
	return $new_egn;
}

	// Добавяне на придошлите ученици
	include '../../add_files/config.php';
	
	$k = 1;
	// Избираме всички ученици в БД и ги съхраняваме в масив
	$select_student = mysql_query("SELECT * FROM fls1egvn_students ");
	
	$students = fopen("students-egn.txt", "r") or die("Error!");
	while ($st = mysql_fetch_array($select_student))
		$stud[] = $st;
	
	
	
	echo ("<h3>Добавяне на ЕГН и маркер</h3><br />");
	while (!feof($students))
	{
		$check = FALSE;
		//Четем име от файла
		$student = fgets($students, 10000);
		foreach ($stud as $st)//while ($st = mysql_fetch_array($select_student))
		{
				$ex = explode (",", $student);
				$string1 = trim($ex[2]);
				$string2 = trim($ex[3]);
				$string3 = trim($ex[4]);
				$string4 = trim($st['family']);
				if (strcmp($ex[0],$st['class']) == 0)
					if (strcmp($string1,$st['name']) == 0)
						if (strcmp($string2,$st['surname']) == 0)
							if (strcmp($string3,$string4) == 0)
								{
									$new_egn = transform_egn($ex[1]);
									echo $k." ".$new_egn." ".$ex[0]." ".$ex[2]." ".$ex[3]." ".$ex[4]."<br />";
									//echo $st['family']." ".$string3."<br />";
									//comp_str($string3, $string4);
									$k++;
									
									/*$stri = trim($ex[4]);//trim($st['family']);
									echo "After trimming <br />";
									comp_str($stri, $st['family']);*/
									if ($st['id_nr'] == 0)
									{
										if ($ex[1][0] == 1) $mark = 1;
											else $mark = 0;
										//if ($mark == 1) echo ("<font color=red>чужд гражданин</font><br />");
										$update_students = mysql_query("UPDATE fls1egvn_students SET marker = $mark, id_nr = $new_egn WHERE student_nr = $st[student_nr] ");
									}
								}
				
					
				/*$insert_new = mysql_query("INSERT INTO fls1egvn_students (student_nr, class, name, surname, family) VALUES (0, \"$ex[0]\", \"$ex[1]\", 
					\"$ex[2]\", \"$ex[3]\") ") or die(mysql_error()); */
			
		}
		
	}
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
