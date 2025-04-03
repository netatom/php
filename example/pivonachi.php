<?php
$array[0]=1;
$array[1]=1;
echo $array[0]."<br>";
echo $array[1]."<br>";

for($i=2;$i<=100;$i++) {
   $array[$i] = $array[$i-1]+$array[$i-2];
   echo $array[$i]."<br>";
}
?>
