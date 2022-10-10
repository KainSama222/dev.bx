<?php

$arr = array(1,2,3,3,2);
$lengthArr = count($arr);

for ($number = 0; $number < $lengthArr; $number++) {
	$found = false;
	for ($duplicate = 0; $duplicate < $lengthArr; $duplicate++) {
		if ($arr[$number] == $arr[$duplicate] && !($number == $duplicate)) {
			$found = true;
		}
	}
	if($found==false){
		echo($arr[$number]);
	}
};