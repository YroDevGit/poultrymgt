<?php


function calculateDiscount($orgPrice, $discount){
	$perc = $discount / 100;
	$disc = $orgPrice * $perc;
	$netPrice = $orgPrice - $disc;
	return $netPrice;
}


/** Test code **/

$originalPrice = 500;
$dscount = 20;

$discountedPrice = calculateDiscount($originalPrice,$dscount);
echo "Discounted Price: ".$discountedPrice;


?>


