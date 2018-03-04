<?php
// Задава 0 в учебния план за предметите Информатика и ИТ
// т.к. те преминават към special_subjects
// и с тях ще се работи по различен начин
// Вече е направено в официалната БД
include '../add_files/config.php';
$upd_sub=mysql_query("UPDATE fls1egvn_school_plan SET eightAE=0, elevenAE=0,twelveAE=0,nineAE=0,tenAE=0,
								eightNE=0, nineNE=0,tenNE=0,elevenNE=0,twelveNE=0 WHERE subject_nr=7 OR subject_nr=8");
	if ($upd_sub) echo ("OK<br />"); else echo ("notOK");

?>