<?php
session_start();
session_regenerate_id();
include '../../add_files/config.php';
ini_set('max_execution_time', 300);
$student_id = mysql_query("SELECT student_nr FROM fls1egvn_students") or die(mysql_error());

while ($id = mysql_fetch_array($student_id))
{
	$insert_half_id = mysql_query("UPDATE fls1egvn_halfmiss SET half_miss=0");
}

?>