<?php
session_start();
$_SESSION['activel'] = "21";
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
                  <span>Add Schedule</span>
                </section>
                
                  <form method="post">
                    <table class="form-tbl">
                      <tr>
                        <td>Vaccine Date*: </td>
                        <td><input class="form-input" type="<?php echo DateAndTime(); ?>" name="e_date" onclick="this.showPicker()" required="" ></td>
                      </tr>
                      <tr>
                        <td>Room: </td>
                        <td><?php showHouses('e_room','form-input','roomcb'); ?></td>
                      </tr>

                      <tr>
                        <td>Medicine: </td>
                        <td><?php showVaccines('e_vaccine','form-input','medcb'); ?></td>
                      </tr>
                      <tr>
                        <td>Medicine stocks: </td>
                        <td><input class="form-input" type="number" readonly="" style="background-color: #f0f0f0;" name="sstocks" id="sstocks" required="" min="1"></td>
                      </tr>
                     <tr>
                        <td>Quantity: </td>
                        <td><input class="form-input" type="number" name="e_qty" id="qqty" required="" min="1" value="0"></td>
                      </tr>
                      <tr>
                        <td>Next schedule*: </td>
                        <td><input class="form-input" type="<?php echo DateAndTime(); ?>" name="e_date1" onclick="this.showPicker()" required="" ></td>
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
                            $e_room = $_POST['e_room'];
                            $e_vaccine = $_POST['e_vaccine'];
                            $e_qty = $_POST['e_qty'];
                            $e_date1 = $_POST['e_date1'];
                            $sql = "insert into mapping values(null,$e_room,$e_vaccine,$e_qty, '$e_date','$e_date1',0,0)";
                            if(setQuery($sql)){
                              echo "Vaccine schedule added ✔️";
                            }
                            else{
                              echo "<span style='color:red;'>$sql</span>";
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
                      <th>House/Row</th>
                      <th>Vaccine</th>
                      <th>Quantity</th>
                      <th>Scheduled date</th>
                      <th>Next schedule</th>
                      <th align="center">Action</th>
                    </tr>
                    <tbody>
                      <?php
                        $query = "SELECT m.map_id,h.house_name,v.vac_name,m.vaccine_qty,m.vac_date,m.vac_next FROM mapping m, vaccines v,housing h WHERE m.house_id = h.house_id AND m.vaccine_id = v.vac_id and m.stat = 0 ORDER BY m.vac_date asc";
                        $db = new Database();
                        $res = mysqli_query($db->connect(),$query);
                        while($col = mysqli_fetch_array($res)){
                          $i_id = $col[0];
                          $col1 = $col[1];
                          $col2 = $col[2];
                          $col3 = $col[3];
                          $col4 = $col[4];
                          $col5 = $col[5];
                          $img = "";
                          if($col1=="House 1, row 1"){
                            $img = "img/h1r1.jpg";
                          }
                          if($col1=="House 1, row 2"){
                            $img = "img/h1r2.jpg";
                          }
                          if($col1=="House 2, row 1"){
                            $img = "img/h2r1.jpg";
                          }
                          if($col1=="House 2, row 2"){
                            $img = "img/h2r2.jpg";
                          }
                        

                       ?>
                      <tr>
                        <td><?php echo $col1; ?><img height="160"  width="160" src="<?php echo $img; ?>"></td>
                        <td><?php echo $col2; ?></td>
                        <td><?php echo $col3; ?></td>
                        <td><?php echo $col4; ?></td>
                        <td><?php echo $col5; ?></td>
                        <td align="center" class="forbutton"><a onclick="return confirm('Are you sure to delete selected data?')" href="includes/queries.php?q=2&id=<?php echo $i_id; ?>&link=mapping.php"><button class="tbtn">Delete</button></a><span></span><a style="display: none;" onclick="return confirm('Are you sure to delete selected data?')" href="includes/queries.php?q=3&id=<?php echo $i_id; ?>&link=mapping.php"><button class="tbtn green">Done</button></a></td>
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
  max-height: 800px;
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
  .forbutton a button{margin-top: 5px;}
  .green{
    background-color: #96ff8f;
    border:solid 1px #82f57a;
  }

</style>

<script type="text/javascript">
  function getTotal(){
    var p1 = parseInt(document.getElementById('sacks').value);
    var p2 = parseInt(document.getElementById('pr').value);
    var ttl = p1 * p2;
    document.getElementById('ttll').value = ttl;
  }

  document.getElementById('medcb').onchange = function(){
    getMedLeft();
  }

  function getMedLeft(){
    var medcb = document.getElementById('medcb').value;
    var xml = new XMLHttpRequest();
    xml.onload = function(){
      var fetched = this.responseText;
      document.getElementById('sstocks').value = parseInt(fetched);
      document.getElementById('qqty').max = document.getElementById('sstocks').value;
    }
    xml.open("GET","includes/mainfunc.php?q=1&id="+medcb);
    xml.send();
  }
</script>