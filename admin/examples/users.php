<?php
$pages = "page9";
$pagename = "All users";
include '../../includes/database.php';


function getUsername($num,$emp){
  $db6 = new Database();
  $sql = "";
  if($num==1){
    $sql = "select * from user where usertype = 1";
  }
  else{
    $sql = "select * from user where usertype = $num and user_id = $emp";
  }
  $ret = "";
  $res = mysqli_query($db6->connect(),$sql);
  if($colx = mysqli_fetch_array($res)){
    $ret = $colx[1];
  }
  return $ret;
  
}
function getPassword($num,$emp){
  $db6 = new Database();
  $sql = "";
  if($num==1){
    $sql = "select * from user where usertype = 1";
  }
  else{
    $sql = "select * from user where usertype = 2 and user_id = $emp";
  }
  $ret = "";
  $res = mysqli_query($db6->connect(),$sql);
  if($colx = mysqli_fetch_array($res)){
    $ret = $colx[2];
  }
  return $ret;
  
}

function getFullName($num){
  $db6 = new Database();
  $sql = "";
  if($num==1){
    $sql = "select * from user where usertype = 1";
  }
  else{
    $sql = "select * from user where usertype = 2";
  }
  $ret = "";
  $res = mysqli_query($db6->connect(),$sql);
  if($colx = mysqli_fetch_array($res)){
    $ret = $colx[4];
  }
  return $ret;
  
}

function getEmpFullName($num, $id){
  $db6 = new Database();
  $sql = "";
  if($num==1){
    $sql = "select * from user where usertype = 1";
  }
  else{
    $sql = "select * from user where usertype = $num and user_id = $id";
  }
  $ret = "";
  $res = mysqli_query($db6->connect(),$sql);
  if($colx = mysqli_fetch_array($res)){
    $ret = $colx[4];
  }
  return $ret;
  
}


function setAccount($username, $password,$name, $num){
  $db6 = new Database();
    $sql = "update user set username = '$username', password = MD5('$password'), uname = '$name' where user_id = $num";
    if(mysqli_query($db6->connect(),$sql)){
      echo "Account modified ✔️";
    }
}


 ?>




<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body class="">
  <div class="wrapper">
    
    <?php include 'includes/sidebar.php'?>

    <div class="main-panel">
      <!-- Navbar -->
      <?php include "includes/nav.php" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">


            <div class="card">
              <div class="card-header">
                <h5 class="title">Admin account</h5>
              </div>
              <div class="card-body">
                <form method="post">  
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="uname" required="" placeholder="Username" id="uname" value="<?php echo getUsername(1,0); ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" required="" name="pword" class="form-control" placeholder="Password" id="pword" value="">
                      </div>
                    </div>
                  </div>
                <div>
                  <span style="color: #1ef642;">
                    <?php

                    if(isset($_POST['btn'])){
                      $uname = $_POST['uname'];
                      $pword = $_POST['pword'];
                      setAccount($uname, $pword,"Admin",1);
                    }
                    ?>
                      <script type="text/javascript">
                        document.getElementById('uname').value = '<?php echo $uname; ?>';
                        document.getElementById('pword').value = '<?php echo $pword; ?>';
                      </script>
                      <?php

                     ?>
                  </span>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="btn" class="btn btn-fill btn-primary">Save</button>
              </div>
              </form>
            </div>



            <div class="card">
              <div class="card-header">
                <h5 class="title">User account</h5>
              </div>
              <div class="card-body">
                <form method="post">  
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" required="" name="uname1" placeholder="Username" id="uname1" value="<?php echo getUsername(2,2); ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" required="" name="pword1" placeholder="Password" id="pword1" value="">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" class="form-control" required="" name="full" placeholder="Fullname" id="full" value="<?php echo getFullName(2); ?>">
                      </div>
                    </div>

                  </div>
                <div>
                  <span style="color: #1ef642;">
                    <?php

                    if(isset($_POST['btn1'])){
                      $uname1 = $_POST['uname1'];
                      $pword1 = $_POST['pword1'];
                      $full = $_POST['full'];
                      setAccount($uname1, $pword1,$full,2);
                      ?>
                      <script type="text/javascript">
                        document.getElementById('uname1').value = '<?php echo $uname1; ?>';
                        document.getElementById('pword1').value = '<?php echo $pword1; ?>';
                        document.getElementById('full').value = '<?php echo $full; ?>';
                      </script>
                      <?php
                    }

                     ?>
                  </span>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" name="btn1">Save</button>
              </div>
              
            </div>
            </form>






            <div class="card">
              <div class="card-header">
                <h5 class="title">User account 2</h5>
              </div>
              <div class="card-body">
                <form method="post">  
                  <div class="row">
                    <div class="col-md-4 pr-md-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" required="" name="uname2" placeholder="Username" id="uname2" value="<?php echo getUsername(3,3); ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" required="" name="pword2" placeholder="Password" id="pword2" value="">
                      </div>
                    </div>
                    <div class="col-md-4 pl-md-1">
                      <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" class="form-control" required="" name="full1" placeholder="Fullname" id="full1" value="<?php echo getEmpFullName(3,3); ?>">
                      </div>
                    </div>

                  </div>
                <div>
                  <span style="color: #1ef642;">
                    <?php

                    if(isset($_POST['btn2'])){
                      $uname2 = $_POST['uname2'];
                      $pword2 = $_POST['pword2'];
                      $full1 = $_POST['full1'];
                      setAccount($uname2, $pword2,$full1,3);
                      ?>
                      <script type="text/javascript">
                        document.getElementById('uname2').value = '<?php echo $uname2; ?>';
                        document.getElementById('pword2').value = '<?php echo $pword2; ?>';
                        document.getElementById('full1').value = '<?php echo $full1; ?>';
                      </script>
                      <?php
                    }

                     ?>
                  </span>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary" name="btn2">Save</button>
              </div>
              
            </div>
            </form>



          </div>
         
        </div>
      </div>
      <?php include 'includes/footer.php'; ?>
    </div>
  </div>



<div id="modax" class="modax" align="center" style="display: none;">
  <div>
    <div class="modabox">
      <div>
        

        <div>
        <form method="post" action="actions/admin.php"> 
            <div class="row width">
          <div class="col-md">
            <div class="card" style="margin-bottom: -30px;">
              <div class="card-header">
                <h5 class="title">Edit Price</h5>
              </div>
              <div class="card-body">
                  <input type="hidden" id="field0" name="fid">
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Egg type</label>
                        <input type="text" id="field1" class="form-control" value="1" name="ftype" readonly="IO">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" id="field2" class="form-control" value="0" name="fprice" min="1" autofocus="">
                      </div>
                    </div>
                  </div>  
              </div>
              <div class="card-footer">
                <table style="width: 100%;">
                  <tr>
                    <td align="left">
                      <button type="button" onclick="closeModax()" class="btnx fixedbtn" name="fbtn">Cancel</button>
                    </td>
                    <td align="right">
                      <button type="submit" class="btnx fixedbtn" name="editprice">Save</button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
          </form>

         
        </div>
      </div>
    </div>
  </div>
</div>




  <?php include 'includes/popup.php'; ?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  
  <?php include 'includes/mainscript.php'; ?>
</body>

</html>

<script type="text/javascript">
  window.addEventListener('load',showTransactions);
  document.getElementById('search').onchange = function(){
    showTransactions();
  }
  function showTransactions(){
    var val = document.getElementById('search').value;
    var xml = new XMLHttpRequest();
    xml.onload = function(){
      document.getElementById('tablebody').innerHTML = this.responseText;
    }
    xml.open("GET","extenstions/comp.php?val="+val);
    xml.send();
  }

</script>



<style type="text/css">
  .form-control[readonly=IO]{
    background-color: transparent;
    color: white;
  }
  .modax{position: fixed;height: 100%; width: 100%; z-index: 100;background-color: rgb(0,0,0,0.5); top: 0;left: 0;padding-top: 200px;}
  .modax-details span{font-size: 20px;}
  .modabox{background-color: white; display: inline-block; width: 30%;}
  .fixedbtn{width: 100px; border:none; border-radius: 5px; padding:5px 5px 5px 5px;}
  .max-width200{width: 350px;}
  

  @media screen and (max-width: 800px) {
  .modabox{background-color: white; display: inline-block; width: 90%;}
  .max-width200{width:90%;}
}
</style>