

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="sidebar">
  <div align="center"><img src="images/check.png" height="100" width="100"></div>
        <div class="" align="center">

          <div class="" align="center" style="margin-bottom: 20px;">
            <span style="color:white;font-size: 25px;">Garde's poultry</span> 
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu" id="sidebarDiv">
          <?php if($uuiid==2){ ?>
          <div class="sidebar__link" id="l0">
            <i class="fa fa-home"></i>
            <a href="dashboard.php">Dashboard</a>
          </div>
        <?php } ?>
          
          <h2>Point of sales</h2>
          <div class="sidebar__link" id="l9">
            <i class="fa fa-money"></i>
            <a href="pos.php">Purchase eggs</a>
          </div>
          <div class="sidebar__link" id="l10">
            <i class="fa fa-shopping-cart"></i>
            <a href="compose.php">Purchase compost</a>
          </div>
          <div class="sidebar__link" id="">
            <i class="fa fa-shopping-cart"></i>
            <a href="chicken.php">Purchase chicken</a>
          </div>
          <?php if($uuiid==2){ ?>
          <h2>Egg production</h2>
          <div class="sidebar__link" id="l1" style="display: none;">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <a href="production.php">Production</a>
          </div>
          <div class="sidebar__link" id="l20">
            <i class="fa fa-product-hunt" aria-hidden="true"></i>
            <a href="prod.php">Production</a>
          </div>
          
          <h2>Chicken</h2>
          <div class="sidebar__link" id="l3">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <a href="birdsPurchase.php">Purchase</a>
          </div>
          <div class="sidebar__link" id="l4">
            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
            <a href="birdsMortality.php">Mortality</a>
          </div>

          
          <h2>Feed Inventory</h2>
          <div class="sidebar__link" id="l5">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <a href="feedPurchase.php">Stock in</a>
          </div>
          <div class="sidebar__link" id="l6">
            <i class="fa fa-cutlery" aria-hidden="true"></i>
            <a href="feedConsumption.php">Stock out</a>
          </div>
          <h2>Medicine and Vaccine</h2>
          <div class="sidebar__link" id="l8">
           <i class="fa fa-medkit"></i>
            <a href="vaccine.php" aria-hidden="true">Purchase Medicine</a>
          </div>
          <div class="sidebar__link" id="l21">
           <i class="fa fa-medkit"></i>
            <a href="mapping.php" aria-hidden="true">Vaccination Schedule</a>
          </div>

          <?php

          } ?>
          
          <div class="sidebar__logout">
            <i class="fa fa-power-off" style="color:white;"></i>
            <a href="logout.php" style="color:white;" onclick="return confirm('are you sure to logout?')">Log out</a>
          </div>
        </div>
      </div>

        <style type="text/css">
          .asd{
            font-family: monospace;
          }
        </style>

      <script type="text/javascript">
        
          window.addEventListener('load',setActive());

        function setActive(){
          var act = <?php echo $_SESSION['activel']; ?>;
          if(act==0){
              document.getElementById('l0').className = "sidebar__link active_menu_link";
          }
          if(act==1){
            document.getElementById('l1').className = "sidebar__link active_menu_link";
          
          }
          if(act==2){
            document.getElementById('l2').className = "sidebar__link active_menu_link";
            
          }

          if(act==3){
            document.getElementById('l3').className = "sidebar__link active_menu_link";
            
          }
          if(act==4){
            document.getElementById('l4').className = "sidebar__link active_menu_link";
            
          }
          if(act==5){
            document.getElementById('l5').className = "sidebar__link active_menu_link";
            
          }
          if(act==6){
            document.getElementById('l6').className = "sidebar__link active_menu_link";
            
          }
          if(act==7){
            document.getElementById('l7').className = "sidebar__link active_menu_link";
            
          }
          if(act==8){
            document.getElementById('l8').className = "sidebar__link active_menu_link";
            
          }
          if(act==9){
            document.getElementById('l9').className = "sidebar__link active_menu_link";
            
          }
          if(act==10){
            document.getElementById('l10').className = "sidebar__link active_menu_link";
            
          }
          if(act==20){
            document.getElementById('l20').className = "sidebar__link active_menu_link";
            
          }
          if(act==21){
            document.getElementById('l21').className = "sidebar__link active_menu_link";
            
          }
        }

      </script>