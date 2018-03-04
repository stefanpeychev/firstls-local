<?php
	//Прехвърля всички ученици в по-горен клас - 8 в 9 и т.н.
	include '../../add_files/config.php';

	$letters = array ('а','б','в','г','д','е','ж','з','и');
	for ($i=0; $i<9; $i++)
	{
		// Учениците от 12 клас се прехвърлят в 13 - при обновяване на учениците те се изтриват, т. к. вече са завършили
		$change0 = mysql_query("UPDATE fls1egvn_students SET class=\"13$letters[$i]\" WHERE class=\"12$letters[$i]\" ") or die(mysql_error());
		
		$change1 = mysql_query("UPDATE fls1egvn_students SET class=\"12$letters[$i]\" WHERE class=\"11$letters[$i]\" ") or die(mysql_error());
		
		$change2 = mysql_query("UPDATE fls1egvn_students SET class=\"11$letters[$i]\" WHERE class=\"10$letters[$i]\" ") or die(mysql_error());
		
		$change3 = mysql_query("UPDATE fls1egvn_students SET class=\"10$letters[$i]\" WHERE class=\"9$letters[$i]\" ") or die(mysql_error());
		
		$change4 = mysql_query("UPDATE fls1egvn_students SET class=\"9$letters[$i]\" WHERE class=\"8$letters[$i]\" ") or die(mysql_error());
		
	}
	if ($change0 && $change1 && $change2 && $change3 && $change4)
		echo ("Success!<br />");
	else echo ("Fail!<br />");
	echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
?>