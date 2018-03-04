<?php
// Замества ЕГН в таблицата с учителите със случайно число
// Вече е направено в официалната БД
// Не е необходимо повторение
// Да се провери дали не може да се дублират стойности!!!
include '../add_files/config.php';

for ($i=1; $i<86; $i++)
{
	$k = rand(40045, 100000);
	$nr1 = ($k + $i*$i)%40045;
	$nr = md5(md5(($k + $i*$i)%40045));
	$replace = mysql_query("UPDATE fls1egvn_teachers SET egn=\"$nr\" WHERE t_nr=$i")or die(mysql_error());
	if ($replace) echo ("$i. $nr1 OK<br />"); else echo ("error<br />");

}
?>