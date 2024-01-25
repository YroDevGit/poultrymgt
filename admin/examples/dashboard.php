<?php
global $page;
$pages = "page1";
include '../../includes/database.php';
$pagename = "Dashboard";
 $db6 = new Database();
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
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    <h5 class="card-category">Sales Record</h5>
                    <h2 class="card-title">Monthly Sales</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchase</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Income</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
                      </label>
                      <!--
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="display: none;">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Egg production</h5>
                <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Trend products</h5>
                <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>Trends</h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Feed expense</h5>
                <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> </h3>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                <h6 class="title d-inline">Tasks(5)</h6>
                <p class="card-category d-inline text text-success" id="rec"></p>
                <div class="dropdown">
                  <button type="button" class="btn  btn-icon" data-toggle="dropdown">
                    <i class="tim-icons icon-pencil"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                   
                      <div align="center" class="padd">
                        <div>
                          <div>
                            <span class="underlined">Add notes</span>
                          </div>
                        </div>
                        <div class="main-body">
                          <div>
                          <span>Title</span>
                        </div>
                        <div>
                          <input class="form-control text-info form-width" type="text" id="ttl" name="">
                        </div>
                        </div>

                        <div class="main-body">
                          <div>
                          <span>Note</span>
                        </div>
                        <div>
                          <input class="form-control text-info form-width" type="text" id="cont" name="">
                        </div>
                        </div>


                        <div class="main-body">
                        
                        <div>
                          <button class="btn btn-primary" onclick="addNotes()">Add note</button>
                        </div>
                        </div>
                      </div>
                    

                  </div>
                </div>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody id="tablebody">
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          
<div class="col-lg-6 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Recent transactions</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        
                        <th>
                          Customer
                        </th>
                        <th>
                          Egg type
                        </th>
                        <th class="text-center">
                          Price
                        </th>
                        <th class="text-center">
                          Quantity
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                      $sql  = "SELECT t.id,t.customer,p.mname,t.price,t.quantity,DATE_FORMAT(t.ddate,'%M %d %Y') FROM transaction t, prices p WHERE t.egg_type = p.id ORDER BY t.ddate desc limit 10";
                      $res = mysqli_query($db6->connect(),$sql);
                      while($colx=mysqli_fetch_array($res)){

                      

                       ?>

                      <tr>
                        <td>
                          <?php echo $colx[1]; ?>
                        </td>
                        <td>
                          <?php echo $colx[2]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $colx[3]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $colx[4]; ?>
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


          <div class="col-lg-6 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Recent Activity</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        
                        <th>
                          #
                        </th>
                        <th>
                          User
                        </th>
                        <th class="text-center">
                          Status
                        </th>
                        <th class="text-center">
                          Date
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                     
                      $sql  = "SELECT l.id, u.Username,l.stat, DATE_FORMAT(l.date,'%M %d %Y %H:%i')'datetime' FROM user u, log_history l WHERE u.User_ID = l.`user` order by l.date desc";
                      $res = mysqli_query($db6->connect(),$sql);
                      while($colx=mysqli_fetch_array($res)){
                        $st = $colx[2];

                        $line = "";
                        if($st==1){
                          $line = "Logged in";
                        }
                        else{
                          $line = "Logged out";
                        }
                      

                       ?>

                      <tr>
                        <td>
                          <?php echo $colx[0]; ?>
                        </td>
                        <td>
                          <?php echo $colx[1]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $line; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $colx[3]; ?>
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
  <?php include 'charts/ch.php'; ?>
  <?php include 'includes/mainscript.php'; ?>
</body>

</html>

<style type="text/css">

  .padd{padding-right: 5px; padding-left: 5px;}
  .main-body{padding-top: 10px;}
  .underlined{text-decoration: underline;}
  .form-width{width: 400px;}


  @media screen and (max-width: 800px){
    .form-width{width: 300px;}
  }


</style>

<script type="text/javascript">

  window.addEventListener("load",showNotes);
  function showNotes(){
    var xm = new XMLHttpRequest();
    xm.onload = function(){
      document.getElementById('tablebody').innerHTML = this.responseText;
    }
    xm.open("GET","actions/notesext.php?type=1");
    xm.send();
  }

  function addNotes(){
    var title = document.getElementById('ttl').value;
    var copies = document.getElementById('cont').value;
    var xm = new XMLHttpRequest();
    xm.onload = function(){
      document.getElementById('rec').innerHTML = this.responseText;
    }
    xm.open("GET","actions/notesext.php?type=2&title="+title+"&cont="+copies);
    xm.send();
    demo.showNotif("top","center","Note add successfully");
    setTimeout(resets,1000);
  }

  function deleteNotes(noteId){
    var xm = new XMLHttpRequest();
    xm.onload = function(){
      document.getElementById('rec').innerHTML = this.responseText;
    }
    xm.open("GET","actions/notesext.php?type=3&note_id="+noteId);
    xm.send();
    setTimeout(resets,1000);
    demo.showNotif("top","center","Note deleted successfully");
  }

  function resets(){
    document.getElementById('ttl').value="";
    document.getElementById('cont').value="";
    showNotes();
    setTimeout(function(){document.getElementById('rec').innerHTML="";},5000);
  }



</script>



