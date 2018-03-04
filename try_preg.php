<?php
			$str = "Александър Хътов";
			$str1 = "дър"." "."Хът";
			$check = preg_match("/$str1/", "$str");
			
			
				if ($check)
				{
					
					echo ("Yes"); echo("<br />");
					
				
				}
			else echo ("No"); echo("<br />");;
			
	
?>
