<?php
session_start();
$uid = $_SESSION['uid'];
include 'database.php';
include 'func.php';
$dbb = new Database();
if(isset($_POST['sub'])){
	$type = $_POST['etype'];
	$size = $_POST['esize'];
	$eggs = $_POST['qt'];
	$price = $_POST['pr'];
	$total = $eggs * $price;
	$exist = cartExist($type,$size,$uid);

	$sql = "";
	
	if($exist==1){
		$sql = "update transaction set quantity = $eggs, price = $price where egg_type = $type and egg_size = $size and stat = 0 and user =  $uid";
	}
	else{
		$sql = "insert into transaction values(null,'temp','$type','$size','$price','$eggs','$total',now(),0,$uid,'not completed yet')";
	}

	
	if(mysqli_query($dbb->connect(),$sql)){
		header("refresh:1;url=../pos.php");
		?>
		<div align="center">
			<div style="margin-top: 200px;">
				<div>
					<div>
						<h1>✔️</h1>
					</div>
					<div>
						<span>Product added to cart</span>
					</div>
					<div>
						<img src="../images/check-mark.png" height="300" width="300">
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if(isset($_POST['bbtt'])){
	$cust = strip($_POST['cust']);
	$date = $_POST['datex'];
	$tcode = $_POST['tcode'];
	$change1 = $_POST['change1'];
	$amount1 = $_POST['amount1'];
	$sql = "update transaction set customer = '$cust', ddate = '$date', tcode = '$tcode' where stat = 0 and user = $uid";
	if(queryx($sql)){
		if(queryx("update transaction set stat = 1 where stat = 0 and user = $uid")){
				
				?>
					<div align="center">
			<div style="margin-top: 50px;">
				<div>
					<div>
						<h1>✔️</h1>
					</div>
					<div>
						<span>Purchase completed</span>
					</div>
					<div>
						<img src="../images/check-mark.png" height="300" width="300">
					</div>
				</div>
			</div>
		</div>

		<div id="back" style="display: none;">
			<div align="center">
				<a href="../pos.php" onclick="return confirm('Are you sure to proceed?')"><button class="back-btn">Back to POS page</button></a>
			</div>
		</div>
		<div align="center" class="for-ticket">
			<div>
				<span>Reciept</span>
			</div>
			<div align="center" class="prbtn"><button onclick="printR()">Print reciept</button></div>
			<div id="ticket" class="fticket">
				<div class="ticket" >
				<div class="rhead" id="rhead">
					<table class="rtable">
						<tr>
							<td align="center" colspan="4">
								<div>
						<span>Garde's Poulty</span>
					</div>
					<div>
						<small>BRGY MAMBAGATON HIMMAYLAN CITY NEGROS OCCIDENTAL</small>
					</div>

					<div>
						<p>Official reciept</p>
					</div>
							</td>
						</tr>
					</table>
				</div>
				<div class="rbody">
					<div>
						<table class="rtable">
							<tr>
								<th align="left">Order</th>
								<th align="left">Price</th>
								<th align="left">Quantity</th>
								<th align="left">Total price</th>
							</tr>
							<?php
							$rx = "SELECT t.id, t.customer, p.mname, t.price, t.quantity, t.total, DATE_FORMAT(t.ddate,'%M %d %Y')'datee', u.uname FROM transaction t, prices p,user u WHERE t.egg_type = p.id and t.user = u.user_id AND t.tcode = '$tcode' and user = $uid";
							$rr = queryx($rx);
							$ttal = 0;
							while($coll = getData($rr)){
								$col1 = $coll[2];
								$col2 = $coll[3];
								$col3 = $coll[4];
								$col4 = $coll[5];
								$cashh = $coll[7];
								$ttal += $col4;;

									?>
							<tr>
								<td class=""><?php echo $col1; ?></td>
								<td class="tdd"><?php echo "₱".$col2; ?></td>
								<td class="tdd"><?php echo $col3; ?></td>
								<td class="tdd"><?php echo "₱".$col4; ?></td>
								
							</tr>
							<?php
						}
							 ?>

							 <tr><td colspan="4" class="padd"></td></tr>
							 <tr><td colspan="4" align="right">
							 	<table>
							 		<tr>
							 			<td>Total: </td>
							 			<td><?php echo "₱".$ttal; ?></td>

							 		</tr>
							 		<tr>
							 			<td>Tendered: </td>
							 			<td><?php echo "₱".$amount1; ?></td>
							 		</tr>
							 		<tr>
							 			<td>Change: </td>
							 			<td><?php echo "₱".$change1; ?></td>
							 		</tr>
							 	</table>
							 </td></tr>
							 <tr><td colspan="4" class="padd"></td></tr>
							 <tr>
							 	<td colspan="4" align="right">Cashier: <?php echo $cashh; ?></td>
							 </tr>
							 <tr>
							 	<td colspan="4" align="right">Date: <?php echo defaultDate(); ?></td>
							 </tr>
							 <tr>
							 	<td colspan="4" align="right">Ref#: <?php echo $tcode; ?></td>
							 </tr>
						</table>
					</div>
				</div>
			</div>
			</div>
		</div>
		
		<style type="text/css">
		.cent{
			text-align: center;
		}
		.fticket{
			padding: 3px;
		}
		.prbtn{
			padding-top: 5px;
			padding-bottom: 5px;
		}
		#back{
			padding-top: 100px;
		}
		.for-ticket{padding-top: 100px;}
			.tdd{
				text-align: left;
			}
			.padd{
				padding-top: 20px;
			}
			.rhead{
				padding-top: 5px;
				padding-bottom: 20px;
				text-align: center;
			}
			.rhead div span{font-size: 20px;}
			.ticket{
				border:solid 3px black;
				display: inline-block;
				width: auto;
				padding-top: 15px;
				padding-bottom: 15px;
				padding-left: 15px;
				padding-right: 15px;
			}
			.rtable{
				width: 600px;
			}
			.back-btn{
				width: 210px;
				height: 35px;
				background-color: #ffd57a;
				border-radius: 5px;
				border: none;
				cursor: pointer;
			}


		</style>

		<script type="text/javascript">
			function printR(){
				 var mywindow = window.open('', 'new div', 'height=400,width=400');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="reciept.css" type="text/css" />');
      var data = document.getElementById('ticket').innerHTML;
      mywindow.document.write('</head><body >');
      mywindow.document.write(data);
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},1000);
      document.getElementById('back').style.display = '';
 

      return true;
			}
		</script>
				<?php
		}
	}
}



 ?>