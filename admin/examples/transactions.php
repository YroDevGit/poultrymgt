<?php
$pages = "page3";
$pagename = "transactions";
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php'; ?>

<body class="">

<div id="mod" align="center" style="display: none;">
  <div>
    <div class="mod-body">
      <div align="right" class="for-close">
        <span onclick="document.getElementById('mod').style.display='none';">X</span>
      </div>
      <div>
        <span>Invoice maker</span>
      </div>
      <div class="for-input">
        <input style="text-align: center;" type="text" id="printer" name="" value="admin">
      </div>
      <div><button class="btn" id="btnprint">🖨️</button></div>
    </div>
  </div>
</div>

<style type="text/css">
  #mod{
    position: fixed;
    top: 0;
    left: 0;
    background: rgb(0,0,0,0.5);
    z-index: 1000;
    height: 100%;
    width: 100%;
    padding-top: 200px;
  }
  .for-close{
    padding-right: 10px;
  }
  .for-close span{
    font-size: 18px;
    cursor: pointer;
  }
  .mod-body{
    display: inline-block;
    padding: 20px 10px 20px 10px;
    background: white;
    border-radius: 5px;
  }
  .for-input{
    padding-top: 10px;
    padding-bottom: 5px;
  }
  .for-input input{
    width: 250px;
    outline: none;
    border-radius: 5px;
    border: solid 1px #cbcbcb;
  }
</style>

  <div class="wrapper">
    
    <?php include 'includes/sidebar.php'?>

    <div class="main-panel">
      <!-- Navbar -->
      <?php include "includes/nav.php" ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          


          <div class="col-md-12">
            <div class="card  card-plain">
              <div class="card-header">
                <h4 class="card-title"> Transaction History </h4>
                <p class="category"> From: <input class="form-control max-width200" id="search1" type="date" onclick="this.showPicker()" name="" placeholder="Enter search"></p>
                <p class="category"> To: <input class="form-control max-width200" id="search2" type="date" onclick="this.showPicker()" name="" placeholder="Enter search"></p>
              </div>
              <div align="right">
                <button class="btn" onclick="document.getElementById('mod').style.display='';"><span class="" style="font-size: 30px">🖨️</span></button>
              </div>
              <div class="card-body" id="transtbl">
                <div class="table-responsive">
                  <table class="table tablesorter " >
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          #
                        </th>
                        <th>
                          Customer
                        </th>
                        <th >
                          Egg Type
                        </th>
                        <th class="text-center">
                          Egg size
                        </th>
                        <th class="text-center">
                          Price
                        </th>
                        <th class="text-center">
                          Quantity
                        </th>
                        <th>
                          Total
                        </th>
                        <th>
                          Date
                        </th>
                        <th>
                          Cashier
                        </th>
                      </tr>
                    </thead>
                    <tbody id="tablebody">
                      
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
  window.addEventListener('load',showTransactions);
  document.getElementById('search1').onchange = function(){
    showTransactions();
  }
  document.getElementById('search2').onchange = function(){
    showTransactions();
  }
  function showTransactions(){
    var val1 = document.getElementById('search1').value;
     var val2 = document.getElementById('search2').value;
    var xml = new XMLHttpRequest();
    xml.onload = function(){
      document.getElementById('tablebody').innerHTML = this.responseText;
    }
    xml.open("GET","extenstions/transext.php?val1="+val1+"&val2="+val2);
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

<script type="text/javascript">
  function pushDownload(){
    var srch = document.getElementById('search').value;
    window.location.href = "backupdata/download.php?q="+srch+"&type=1";
  }
</script>

<script type="text/javascript">
      function printR(name){
         var mywindow = window.open('', 'new div', 'height=400,width=400');
      mywindow.document.write('<html><head><title></title>');
      mywindow.document.write('<link rel="stylesheet" href="../assets/css/black-dashboard.css" type="text/css" />');
      var data = document.getElementById('transtbl').innerHTML;
      mywindow.document.write('</head><body >');
      mywindow.document.write('<div align="center"><h1>Transaction</h1><h3>Garde poulty</h3>');
  mywindow.document.write('<div><h6>Brgy MAMBAGATON HIMMAYLAN city negros occ</h6></div>')
      mywindow.document.write('</div>');

      mywindow.document.write(data);
      mywindow.document.write('<div align="center"><div style="border-bottom:solid 1px white; width:300px;color:white; font-size:18px;">'+name+'</div><h5>Signature over printed name</h5>');
      mywindow.document.write('</div>');
      mywindow.document.write('</body></html>');
      mywindow.document.close();
      mywindow.focus();
      setTimeout(function(){mywindow.print();},1000);
      document.getElementById('back').style.display = '';
 

      return true;
      }


      document.getElementById('btnprint').onclick = function(){
        var invoicer = document.getElementById('printer').value;
        printR(invoicer);
      }


    </script>