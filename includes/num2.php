<?php

function checkGrade($score){
	$grade = "";
	if($score<60){
		$grade = "F";
	}
	else if($score>=60 && $score<=69){
		$grade= "D";
	}
	else if($score>=70 && $score<=79){
		$grade = "C";
	}
	else if($score>=80 && $score<=89){
		$grade = "B";
	}
	else if($score>=90){
		$grade = "A";
	}
	return $grade;
}


/** Test code **/

$varGrade = 90;
$testGrade = checkGrade($varGrade);
echo $testGrade;


 ?>