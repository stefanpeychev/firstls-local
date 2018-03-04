<?php 
include '../../add_files/config.php';
	

?>
<form action=substitute2.php method=POST>
Изберете учител:<select name=t_name>

<?php
$select_teacher=mysql_query("SELECT t_nr, t_name FROM fls1egvn_teachers WHERE status <> 3");
while ($teacher1=mysql_fetch_array($select_teacher))
	echo ("<option value=$teacher1[t_nr]>$teacher1[t_name]</option>");

			

?>
</select>
<input type=submit name=submit value="Продължи" />
</form>
<?php
