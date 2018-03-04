<?php
	// Извежда класовете и класните ръководители
	// Да се добави възможност за промяна на класния ръководител
	// за да не се прави ръчно в БД
	include '../../add_files/config.php';
	
	
	$classess = array("8а","8б","8в","8г","8д","8е","8ж","8з","8и",
						"9а","9б","9в","9г","9д","9е","9ж","9з","9и",
						"10а","10б","10в","10г","10д","10е","10ж","10з","10и",
						"11а","11б","11в","11г","11д","11е","11ж","11з","11и",
						"12а","12б","12в","12г","12д","12е","12ж","12з","12и",
						);
	
	for ($i=0; $i<45; $i++)
	{
		$select_t_nr = mysql_query("SELECT class_leader FROM fls1egvn_classes WHERE class_nr = $i + 1");
		while ($t_nr = mysql_fetch_array($select_t_nr))
		{
			$select_t_name = mysql_fetch_array(mysql_query("SELECT t_name FROM fls1egvn_teachers WHERE t_nr = $t_nr[class_leader]"));
			echo "$classess[$i] $select_t_name[t_name]<br />";
		}
		
		
	}
	
	
		echo ("<a href=\"local_menu.html\">Назад към менюто с функции</a>");
	
?>
