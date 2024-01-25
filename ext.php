<?php
$type = $_GET['type'];
$xid = $_GET['id'];
include 'includes/database.php';
include 'includes/action.php';

if($type==1){
$sql = "select * from prices where id = $xid";

$dbb1 = new Database();
$rex = mysqli_query($dbb1->connect(),$sql);
if($colx = mysqli_fetch_array($rex)){
	$vax = $colx[2];
 ?>

<td class="first"><label>Price per tray</label></td>
<td><input class="inp" id="pr" type="number" name="price" readonly="" style="background-color: #d8fded;" value="<?php echo $vax; ?>"></td>


 <?php
}
}

if($type==2){

$sql = "SELECT sum(p.egg_mini), SUM(p.egg_mini),SUM(p.egg_pewee),SUM(p.egg_small),SUM(p.egg_medium),SUM(p.egg_large),SUM(p.egg_xl),SUM(p.egg_jumbo),SUM(p.egg_brook),SUM(p.egg_stain) FROM production p";

$dbb1 = new Database();
$rex = mysqli_query($dbb1->connect(),$sql);

$stt = "select sum(quantity) from transaction where egg_type = $xid";
$rr = mysqli_query($dbb1->connect(),$stt);
$min = 0;
if($cox = mysqli_fetch_array($rr)){
	$min = $cox[0];
}

if($colx = mysqli_fetch_array($rex)){
	$vax = $colx[$xid];
	$left = $vax - $min;
 ?>

<td class="first"><label>Stock left</label></td>
<td><input class="inp" type="number" id="stock" style="background-color: #d8fded;" name="stock" readonly="" value="<?php echo $left; ?>"></td>


 <?php
}
}
if($type==3){
	echo "";
}

if($type==5){
	$size = $_GET['sz'];
	$type =$_GET['tp'];
	$sql = "SELECT SUM(i.tray) FROM inventory i WHERE i.egg_id = $type AND i.egg_size = $size AND stat = 0";
	$res = setQuery($sql);
	$qty = 0;
	if($cox = getData($res)){
		$qty = $cox[0];
		if(is_null($qty)){
			$qty = 0;
		}
	}
	$sold = totalSold($type,$size);
	echo $qty - $sold;
}


  ?>








