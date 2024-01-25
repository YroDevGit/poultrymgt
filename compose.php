<?php
session_start();
$_SESSION['activel'] = "10";
if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}
include 'includes/database.php';
include 'includes/action.php';

function getComposePrice(){
  $sql = "select * from composeprice";
  $db = new Database();
  $res = mysqli_query($db->connect(),$sql);
  $ret = 0;
  if($colx = mysqli_fetch_array($res)){
    $ret = $colx[1];
  }
  return $ret;
}


function addCompose($cust, $date, $sack, $price){
    $sql = "insert into composetbl values(null, '$cust','$date','$sack','$price','0')";
    $ss = "update composeprice set comprice = $price";
    $db = new Database();
    mysqli_query($db->connect(),$ss);
    if(mysqli_query($db->connect(),$sql)){
        echo "<span style='color:green;'>Compost added ✔️</span>";
    }
    else{
        echo "<span style='color:green;'>Connection failed ❌️</span>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "partials/_head.php";?>
<body id="body">
    <div class="container">
        <!-- top navbar -->
        <?php include "partials/_top_navbar.php";?>
        <main>

          <div>
            <table>
              <tr>
    <td style="vertical-align: top;">
      <div class="add_sec">
            
              <div>
                <section class="for-title">
                  <span>Purchase compost</span>
                </section>
                
                  <form method="post">
                    <table class="form-tbl">
                      <tr>
                        <td>Date*: </td>
                        <td><input class="form-input" type="date" name="c_date" onclick="this.showPicker()" required=""></td>
                      </tr>
                      <tr>
                        <td>Kilograms*: </td>
                        <td><input class="form-input" onchange="getTotal()" onkeyup="getTotal()" type="number" name="c_sack" value="1" min="1" required="" id="sacks"></td>
                      </tr>
                      <tr>
                        <td>Price*: </td>
                        <td><input class="form-input" onchange="getTotal()" onkeyup="getTotal()" type="number" name="c_price" value="<?php echo getComposePrice(); ?>" min="1" required="" id="pr"></td>
                      </tr>
                      <tr>
                        <td>Total: </td>
                        <td><input class="form-input totalfield" type="number" readonly="" name="ttlaadasd" value="<?php echo getComposePrice(); ?>" min="1" required="" id="ttll"></td>
                      </tr>
                      <tr>
                        <td>Customer*: </td>
                        <td><input class="form-input" type="text" name="c_cust" required="" placeholder="Enter customer name."></td>
                      </tr>

                      <tr>
                        <td colspan="2" align="right">
                          <button class="form-btn" type="submit" name="subtn">Submit</button>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"> 
                          <?php

                          if(isset($_POST['subtn'])){
                            $c_date = $_POST['c_date'];
                            $c_sack = $_POST['c_sack'];
                            $c_cust = $_POST['c_cust'];
                            $c_price = $_POST['c_price'];

                            addCompose($c_cust,$c_date, $c_sack, $c_price);
                            ?>
                            <script type="text/javascript">
                              document.getElementById('pr').value = <?php echo getComposePrice(); ?>;
                              document.getElementById('ttll').value = <?php echo getComposePrice(); ?>;
                            </script>
                            <?php
                          }

                           ?>
                        </td>
                      </tr>
                    </table>
                  </form>
                
              </div>
           </div>
                </td>

<td style="padding-left: 10px; padding-right: 10px; vertical-align: top;">
  <div class="disp_sec">
            <div>
              <div>
                <div align="left">
                  <section class="scroller">
                  <table class="comptbl">
                    <tr>
                      <th>Customer</th>
                      <th>Kilograms</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                    <tbody>
                      <?php
                        $query = "SELECT c.c_id,c.c_cust,DATE_FORMAT(c.c_date,'%M %d %Y')'date',c.c_sack,c.c_price FROM composetbl c WHERE c.stat =0 ORDER by c.c_date desc";
                        $db = new Database();
                        $res = mysqli_query($db->connect(),$query);
                        while($col = mysqli_fetch_array($res)){
                          $col1 = $col[0];
                          $col2 = $col[1];
                          $col3 = $col[2];
                          $col4 = $col[3];
                          $col5 = $col[4];
                        

                       ?>
                      <tr>
                        <td><?php echo $col2; ?></td>
                        <td><?php echo $col4; ?></td>
                        <td><?php echo $col5; ?></td>
                        <td><?php echo $col3; ?></td>
                      </tr>
                      <?php

                        }
                       ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           </div>
                </td>
              </tr>
            </table>
          </section>
          </div>
           
           
        </main>
       
        <?php include "partials/_side_bar.php";?>
    </div>
    <script src="script.js"></script>
</body>
</html>

<style type="text/css">
.add_sec{
	
	
}
.disp_sec{
	padding-left: 20px;
	padding-top: 20px;
}
.for-title{
	text-align: center;
	padding-bottom: 25px;
}
.scroller{
  max-height: 600px;
  overflow-y: scroll;
}
.comptbl tr th{
	border-collapse: collapse;
	background-color: #4bf7f4;
	border: solid 1px #d6d6d6;
	width: 200px;
}
.for-title span{
	font-size: 22px;
	font-weight: bold;
	width: 90%;
	border-bottom: solid 1px #c2c2c2; 
}
div{
	border: none;
}
	.add_sec div{
		width: auto;
		height: auto;
		padding: 20px 10px 20px 10px;
		border:solid 1px #c2c2c2;
		display: inline-block;
	}
	.add_sec{
		padding-left: 20px;
		padding-top: 20px;
	}
	form{
		border: none;
		width:100%;
   margin:auto;
      text-align: left;
   	padding: 1px;
      border: none;
   
	}
	tr{
		border: none;
	}
	table{
		margin: auto;
	}
	.form-input{
		width: 200px;
		height: 25px;
		border-radius: 5px;
		border:solid 1px #c2c2c2;
		outline-color: #06eae6;
		padding: 0px 5px 0px 5px;
		font-size: 17px;
	}
  .totalfield{
    border:solid 2px #06eae6;
  }
	.form-btn{
		width: 100px;
		height: 25px;
		border-radius: 5px;
		border:solid 1px #06eae6;
		background-color: #06eae6;
		cursor: pointer;
	}
	.form-btn:hover{
		background-color: #06ea21;
		border: solid 1px #06ea21; 
	}
	.comptbl tbody tr td{
		border: solid 1px #d6d6d6;
	}
  table{
    width: 100%;
  }
</style>

<script type="text/javascript">
  function getTotal(){
    var p1 = parseInt(document.getElementById('sacks').value);
    var p2 = parseInt(document.getElementById('pr').value);
    var ttl = p1 * p2;
    document.getElementById('ttll').value = ttl;
  }
</script>