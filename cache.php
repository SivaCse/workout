<?php

$arr = array();

for($i=0;$i<=100;$i++){

	$arr[$i] = 'Country  '.$i;
}

echo json_encode($arr);

?>