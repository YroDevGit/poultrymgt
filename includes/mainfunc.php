<?php
session_start();
$uid = $_SESSION['uid'];
include 'database.php';
include 'func.php';
$type = $_GET['q'];



if($type == 1){
	$id = $_GET['id'];
	$sql = "select * from vaccines where vac_id = $id";
	$res = setQuery($sql);
	$ret = 0;
	if($col = getData($res)){
		$ret = $col[3];
		if(is_null($ret)){
			$ret = 0;
		}
	}
	echo $ret - getMedUsed($id);
}

 ?>