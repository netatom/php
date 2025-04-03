<? for($i=0; $i<12; $i++){ 
	$month_str = date('m', strtotime("- ".$i." month"));
	$month = date('Ym', strtotime("- ".$i." month"));
	echo $month_str;
	echo "<br/>";
	echo $month;
	echo "<br/>";
	echo "<br/>";
}?>