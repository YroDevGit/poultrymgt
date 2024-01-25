<?php
$val = $_GET['q'];
session_start();
$uid = $_SESSION['uid'];
include 'database.php';
include 'func.php';

$sql = "update mapping set vac_date = now() where map_id = '$val'";
if(setQuery($sql)){
	header("refresh:0;url=../dashboard.php");
}

 ?>