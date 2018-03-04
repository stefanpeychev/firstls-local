<?php
include '../../add_files/config.php';

$teach=$_REQUEST['t_name'];
$days = array ('m1', 'm2', 'm3', 'm4', 'm5', 'm6', 'm7', 'm8',
               't1', 't2', 't3', 't4', 't5', 't6', 't7', 't8',
               'w1', 'w2', 'w3', 'w4', 'w5', 'w6', 'w7', 'w8',
               'th1', 'th2', 'th3', 'th4', 'th5', 'th6', 'th7', 'th8',
               'f1', 'f2', 'f3', 'f4', 'f5', 'f6', 'f7', 'f8');
$select_sedra = mysql_query("SELECT * FROM fls1egvn_sedra WHERE teacher_nr = $teach");
while ($teacher = mysql_fetch_array($select_sedra))
		$sedra[] = $teacher;

    
$select_subject_nr = mysql_query("SELECT min(nr), subject_nr FROM fls1egvn_teacher_subject WHERE t_nr = $teach");
$subject_nr = mysql_fetch_array($select_subject_nr);

$select_substitutes = mysql_query("SELECT t_nr FROM fls1egvn_teacher_subject WHERE t_nr <> $teach AND subject_nr = $subject_nr[subject_nr] ") or die (mysql_error());

while($t = mysql_fetch_array($select_substitutes))
{
    $select_sub_sedra = mysql_query("SELECT * FROM fls1egvn_sedra WHERE teacher_nr = $t[t_nr]");
    while ($sub_sedra = mysql_fetch_array($select_sub_sedra))
        $substitute_sedra[] = $sub_sedra;
}

echo("<table width = 60%><tr>");
foreach ($days as $day)
{
    
    for ($i = 0; $i < mysql_num_rows($select_sub_sedra);$i++)
    {
        if ($substitute_sedra[$i][$day] == 'o' && $sedra[0][$day] != 'o')
                {
                    $name = mysql_fetch_array(mysql_query("SELECT t_name FROM fls1egvn_teachers WHERE t_nr = $substitute_sedra[$i][teacher_nr]"));
                    echo "<td>".$day." ".$sedra[0][$day]." ".$name['t_name']."</td></tr><tr>";
                }
    }
}
echo ("</tr></table>");

    


/*while($t = mysql_fetch_array($select_substitutes))
    {
        
        for ($i = 0; $i < mysql_num_rows($select_sub_sedra);$i++)
        foreach ($days as $day)
        {
            if ($substitute_sedra[$i][$day] == 'o' && $sedra[0][$day] != 'o')
                {
                   // $name = mysql_fetch_array(mysql_query("SELECT teacher_name FROM fls1egvn_teachers WHERE t_nr = $substitute_sedra[$i][teacher_nr]"));
                    echo $day." ".$sedra[0][$day]." ".$substitute_sedra[$i]['teacher_nr']."<br />";
                }
        }

       
    }*/
    

?>