<?php
session_start();
session_regenerate_id();
include '../../add_files/config.php';
ini_set('max_execution_time', 300);
$student_id = mysql_query("SELECT student_nr FROM fls1egvn_students") or die(mysql_error());
$i = 0;
while ($id = mysql_fetch_array($student_id))
{
	if ($id['student_nr'] != $i + 1) {echo $id['student_nr']."<br />";
	$i++;}
	$i++;
}

?>