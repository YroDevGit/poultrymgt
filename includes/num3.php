<?php

function sumOddNumbers($number){
	$sum = 0;
	if($number<0){
		$sum = 0;
	}
	else{
		for ($i=1; $i <=$number; $i++) { 
			if($i%2==0){
				//No actions// It means the number is not odd. (ang number even)
			}
			else{
				$sum += $i;
			}
		}
	}
	return $sum;
}


/** Test Code **/

$integer = 10;

$totalOddNumbers = sumOddNumbers($integer);
echo $totalOddNumbers;


 ?>