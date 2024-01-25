<?php
session_start();
$uid = $_SESSION['uid'];
include 'database.php';
include 'func.php';
$dbb = new Database();

$data = $_GET['q'];

if($data == 1){
	$link = $_GET['link'];
	$inv = $_GET['id'];
	$sql = "update inventory set stat = 1  where inv_id = $inv";
	if(setQuery($sql)){
		header("refresh:0;url=../".$link);
	}
}
if($data == 2){
	$link = $_GET['link'];
	$inv = $_GET['id'];
	$sql = "update mapping set stat = 1 where map_id = $inv";
	echo $sql;
	if(setQuery($sql)){
		header("refresh:0;url=../".$link);
	}
}


 ?>