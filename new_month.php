<?php
	// Първоначална инициализация на таблицата с месеците
	include '../../add_files/config.php';
	
	$months = array("sep","oct","nov","dec","jan","feb","mar","apr","may","jun");
	for ($i = 1; $i < 46; $i++)
	{
		for ($k = 0; $k < 10; $k++)
			$insrt_new = mysql_query("INSERT INTO fls1egvn_month (month_nr, class_nr, month, flag) VALUES (0, $i, \"$months[$k]\", 0) ") 
											or die(mysql_error());
	}
	for ($i = 1; $i < 46; $i++)
	{
		$upd = mysql_query("UPDATE fls1egvn_month SET flag = 1 WHERE class_nr = $i AND (month = \"sep\" OR month = \"oct\" OR 
								month = \"nov\") ") or die(mysql_error());
	}
?>
