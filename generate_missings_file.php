
<form name="myForm" action=generate_missings_file1.php method=POST>
	<font size=3>
	
	Изберете месец:<br />
	<select name="month" id="month" style="color:blue;font-weight: bold;" onchange="myFunction2(this.value);">
			<option value=none>Изберете...</option>
			<?php
				$months = array("Септември","Октомври","Ноември","Декември","Януари","Февруари","Март","Април","Май","Юни");
				$months1 = array("sep","oct","nov","dec","jan","feb","mar","apr","may","jun");
				
				for ($k = 0; $k < 10; $k++)
					echo ("<option value=$months1[$k]>$months[$k]</option>");
			?>
		</select>
	<input type=submit name=submit />
	</form>