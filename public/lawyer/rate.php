<?php 
// 5.	ADMINISTRATION SUMMONS

$propertyValue = 6000000;
$rate = 2000;
if ($propertyValue <= 1000) {
	echo $rate = 500;
} elseif ($propertyValue <= 250000) {
	echo $rate = 750;
}elseif ($propertyValue <= 500000) {
	echo $rate = 1000;
}elseif ($propertyValue <= 1000000) {
	echo $rate = 1500;
}elseif ($propertyValue > 1000000) {
	echo $rate = 2000;
}else {
	echo $rate;
}

// echo $rate;
?>