<?php
session_start();
$_SESSION['activel'] = "20";
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
                  <span>Add eggs</span>
                </section>
                
                  <form method="post">
                    <table class="form-tbl">
                      <tr>
                        <td>Date*: </td>
                        <td><input value="<?php echo getToday(); ?>" class="form-input" type="<?php echo DateAndTime(); ?>" name="e_date" onclick="this.showPicker()" required="" ></td>
                      </tr>
                      <tr>
                        <td>Egg type: </td>
                        <td><?php showEggTypes('e_type','form-input','cbbb'); ?></td>
                      </tr>
                      <tr>
                        <td>Egg size: </td>
                        <td><?php showEggSize('e_size','form-input','cbbb'); ?></td>
                      </tr>
                     <tr>
                        <td>Quantity: </td>
                        <td><input class="form-input" type="number" name="e_qty" onchange="getTrays()" onkeyup="getTrays()" id="eggqty" required="" min="0" value="0"></td>
                      </tr>
                     
                      <tr>
                        <td>Trays: </td>
                        <td><input class="form-input no-func" onkeypress="return false;" id="tray"  type="hidden" name="e_tray" required="" min="0" value="0">
                            <input type="text" class="form-input no-func" required="" onkeypress="return false;" id="tray1" value="0" name="">
                        </td>
                      </tr>

                      <tr>
                        <td colspan="2" align="right">
                          <button class="form-btn" type="submit" name="subtn" onclick="return confirm('are you sure to proceed?')">Submit</button>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center"> 
                          <?php

                          if(isset($_POST['subtn'])){
                            $e_date = $_POST['e_date'];
                            $e_type = $_POST['e_type'];
                            $e_size = $_POST['e_size'];
                            $e_qty = $_POST['e_qty'];
                            $e_tray = $_POST['e_tray'];
                            $sql = "insert into inventory values(null,$e_type,$e_size,$e_qty,$e_tray,'$e_date',0)";
                            if(setQuery($sql)){
                              echo "Egg added to inventory ✔️";
                            }
                            else{
                              echo "<span style='color:red;'></span>";
                            }
                            
                            ?>
                           
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
                      <th>Egg type</th>
                      <th>Egg size</th>
                      <th>Quantity</th>
                      <th>Tray</th>
                      <th>Date produced</th>
                      <th align="center">Action</th>
                    </tr>
                    <tbody>
                      <?php
                        $query = "SELECT i.inv_id, e.mname, s.size_name, i.quantity,i.tray,i.date_produced FROM inventory i, eggs e, egg_size s WHERE i.egg_id = e.id AND s.size_id = i.egg_size AND i.stat =0 order by i.date_produced desc";
                        $db = new Database();
                        $res = mysqli_query($db->connect(),$query);
                        while($col = mysqli_fetch_array($res)){
                          $i_id = $col[0];
                          $col1 = $col[1];
                          $col2 = $col[2];
                          $col3 = $col[3];
                          $col4 = $col[4];
                          $col5 = $col[5];
                        

                       ?>
                      <tr>
                        <td><?php echo $col1; ?></td>
                        <td><?php echo $col2; ?></td>
                        <td><?php echo $col3; ?></td>
                        <td><?php echo intval($col4); ?></td>
                        <td><?php echo $col5; ?></td>
                        <td align="center"><a onclick="return confirm('Are you sure to delete selected data?')" href="includes/queries.php?q=1&id=<?php echo $i_id; ?>&link=prod.php"><button class="tbtn">Delete</button></a></td>
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
		width: 100%;
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

  .form-input{
    width: 100%;
    height: 25px;
    border-radius: 5px;
    border:solid 1px #c2c2c2;
    outline-color: #06eae6;
    padding: 0px 5px 0px 5px;
    font-size: 17px;
  }
  .no-padding{
    padding: 0px;
    height: auto;
  }

  
  .form-tbl tr td{width: 150px;padding-right: 10px;}
  .tbtn{
    width: 80%;
    height: 30px;
    border: solid 1px #fe6262;
    background-color: #ff9e9e;
    border-radius: 5px;
    cursor: pointer;
  }

  .no-func{
    outline: none;
    background: #ebebeb;
  }

</style>

<script type="text/javascript">
  function getTotal(){
    var p1 = parseInt(document.getElementById('sacks').value);
    var p2 = parseInt(document.getElementById('pr').value);
    var ttl = p1 * p2;
    document.getElementById('ttll').value = ttl;
  }

  function getTrays(){
    var qty = document.getElementById('eggqty').value;
    var trays = qty / 30;
    document.getElementById('tray').value = trays;
    var tr = parseFloat(trays);
    document.getElementById('tray1').value = tr;
  }
</script>