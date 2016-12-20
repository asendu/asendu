<?php 
echo "[$sec]<br>";
$sec=(int)$sec;
$s=$sec % 60;
$m=(($sec-$s) / 60) % 60;
$h=floor($sec / 3600);
echo $h.":".substr("0".$m,-2).":".substr("0".$s,-2);
?>