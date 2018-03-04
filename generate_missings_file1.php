<?php
	include '../../add_files/config.php';
	
	// Избираме всички ученици в БД и ги съхраняваме в масив
	
	$select_student = mysql_query("SELECT * FROM fls1egvn_students WHERE class IN (\"8а\",\"8б\",\"8в\",\"8г\",\"8д\",\"8е\",\"8ж\",\"8з\",\"8и\",
						\"9а\",\"9б\",\"9в\",\"9г\",\"9д\",\"9е\",\"9ж\",\"9з\",\"9и\",
						\"10а\",\"10б\",\"10в\",\"10г\",\"10д\",\"10е\",\"10ж\",\"10з\",\"10и\",
						\"11а\",\"11б\",\"11в\",\"11г\",\"11д\",\"11е\",\"11ж\",\"11з\",\"11и\",
						\"12а\",\"12б\",\"12в\",\"12г\",\"12д\",\"12е\",\"12ж\",\"12з\",\"12и\") ORDER BY FIELD(class,\"8а\",\"8б\",\"8в\",\"8г\",\"8д\",\"8е\",\"8ж\",\"8з\",\"8и\",
						\"9а\",\"9б\",\"9в\",\"9г\",\"9д\",\"9е\",\"9ж\",\"9з\",\"9и\",
						\"10а\",\"10б\",\"10в\",\"10г\",\"10д\",\"10е\",\"10ж\",\"10з\",\"10и\",
						\"11а\",\"11б\",\"11в\",\"11г\",\"11д\",\"11е\",\"11ж\",\"11з\",\"11и\",
						\"12а\",\"12б\",\"12в\",\"12г\",\"12д\",\"12е\",\"12ж\",\"12з\",\"12и\"), name, surname, family ");
	
	$month = $_REQUEST['month'];
	
	switch ($month)
	{
		case "sep":$month1 = 9;break;
		case "oct":$month1 = 10;break;
		case "nov":$month1 = 11;break;
		case "dec":$month1 = 12;break;
		case "jan":$month1 = 1;break;
		case "feb":$month1 = 2;break;
		case "mar":$month1 = 3;break;
		case "apr":$month1 = 4;break;
		case "may":$month1 = 5;break;
		case "jun":$month1 = 6;break;
	}
	$missings_file = fopen("0400045_2017_$month1.txt", "w+") or die("Error!");
	$izv = $month."_w";
	$neizv = $month."_h";
	$parts = $month."_p";
	
	while ($student = mysql_fetch_array($select_student))
	{
		if ($student['class'][0] == 8) $vipusk = 8;
			else if ($student['class'][0] == 9) $vipusk = 9;
					else if ($student['class'][1] == 0) $vipusk = 10;
							else if ($student['class'][1] == 1) $vipusk = 11;
									else $vipusk = 12;
		$select_missings = mysql_fetch_array(mysql_query("SELECT $izv, $neizv, $parts FROM fls1egvn_missings WHERE student_nr = $student[student_nr]"));
			if ($select_missings["$parts"] == 1) $select_missings["$neizv"] += 0.5;
				else if ($select_missings["$parts"] == 2) $select_missings["$neizv"] += 1;
					else $select_missings["$neizv"] .= ".0";
			$select_missings["$izv"] .= ".0";
			$family = trim($student["family"]);
		$new = "400045|2017|$month1|$student[marker]|$student[id_nr]|$student[name]|$student[surname]|$family|$vipusk|||$student[class]|0||$select_missings[$izv]|$select_missings[$neizv]\r\n";
		//$new = mb_convert_encoding($new1, "WINDOWS-1251");
		fwrite($missings_file, $new);
	}
	
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>
