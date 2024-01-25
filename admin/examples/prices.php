<?php
$pages = "page2";
$pagename = "Prices";
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
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Egg prices</h4>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="" >
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Egg Size
                        </th>
                        <th>
                          Prices
                        </th>
                        <th>
                          Purchase
                        </th>
                        <th class="text-center">
                          Actions
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      include "../../includes/database.php";
                      $db6 = new Database();

                      $sqlx = "SELECT p.id,p.mname,p.prices,(SELECT case when SUM(quantity)IS null then '0' ELSE SUM(quantity) end FROM transaction WHERE transaction.egg_type = p.id)'purchase' FROM prices p, transaction t GROUP BY p.id";
                      $resultset = mysqli_query($db6->connect(), $sqlx);

                      while($column = mysqli_fetch_array($resultset)){
                        $c0 = $column[0];
                        $c1 = $column[1];
                        $c2 = $column[2];
                        $c3 = $column[3];


                       ?>
                      <tr>
                        <td>
                          <?php echo $c1; ?>
                        </td>
                        <td>
                          <?php echo "₱".$c2; ?>
                        </td>
                        <td>
                          <?php echo $c3; ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-fill btn-primary" onclick="
                            document.getElementById('field0').value = '<?php echo $c0; ?>';
                            document.getElementById('field1').value = '<?php echo $c1; ?>';
                            document.getElementById('field2').value = '<?php echo $c2; ?>';
                            
                            document.getElementById('modax').style.display='';
                            document.getElementById('field2').focus();
                            ">EDIT</button>
                        </td>
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
  document.getElementById('editbtn').onclick = function(){
    document.getElementById('modax').style.display = '';
  }

  function closeModax(){
    document.getElementById('modax').style.display= 'none';
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
  

  @media screen and (max-width: 800px) {
  .modabox{background-color: white; display: inline-block; width: 90%;}
}
</style>