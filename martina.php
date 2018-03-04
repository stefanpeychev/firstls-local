<?php

	include '../../add_files/config.php';


	$select_egn = mysql_query("SELECT egn FROM fls1egvn_teachers");
	$new_teachers = fopen("new_teachers.txt", "a+") or die("Error!");
	$row = mysql_num_rows($select_egn);
	
	$check = TRUE;
	
	$k = rand(40045, 100000);
	$j = rand(1, 100);
	$nr = md5(md5(($k + $j*$j)%40045));
	$nr1 = ($k + $j*$j)%40045;
	
	while ($check)
	{		
		$i = 0;
		while ($egn = mysql_fetch_array($select_egn))
		{
			if ($egn['egn'] == $nr) break;
			$i++;
		}
		
		if ($i == $row) $check = FALSE;
		else
		{
			$k = rand(40045, 100000);
			$j = rand(1, 100);
			$nr = md5(md5(($k + $j*$j)%40045));
			$nr1 = ($k + $j*$j)%40045;
		}
		mysql_data_seek($select_egn, 0);
	}
	
	$new = "Мартина Симеонова Тодорова $nr1\n";
	
	fwrite($new_teachers, $new);
	$update_martina = mysql_query("UPDATE fls1egvn_teachers SET egn=\"$nr\" WHERE t_nr = 37") or die(mysql_error());
	echo ("$nr $new");
	?>