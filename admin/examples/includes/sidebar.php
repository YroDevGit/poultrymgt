<div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
         
          <div align="center">
            <a href="javascript:void(0)" class="simple-text logo-normal">
            Garde's<br>Poultry Management<br>System
          </a>
          </div>
        </div>
        <ul class="nav">
          <li id="link1">
            <a href="./dashboard.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>

          
          
          <li id="link2" style="display: none;">
            <a href="./prices.php">
              <i class="tim-icons icon-money-coins"></i>
              <p>Prices</p>
            </a>
          </li>
          <li id="link3">
            <a href="./transactions.php">
              <i class="tim-icons icon-notes"></i>
              <p>Transactions</p>
            </a>
          </li>
          <li id="link6">
            <a href="./compose.php">
              <i class="tim-icons icon-trash-simple"></i>
              <p>Compost</p>
            </a>
          </li>
          <li id="link4" style="display: none;">
            <a href="./productions.php">
              <i class="tim-icons icon-bag-16"></i>
              <p>Productions</p>
            </a>
          </li>
          <li id="link10">
            <a href="./inventory.php">
              <i class="tim-icons icon-app"></i>
              <p>Eggs inventory</p>
            </a>
          </li>
          <li id="link11">
            <a href="./vaccine.php">
              <i class="tim-icons icon-calendar-60"></i>
              <p>Schedule</p>
            </a>
          </li>

          <li id="link5">
            <a href="./feed.php">
              <i class="tim-icons icon-basket-simple"></i>
              <p>Feeds</p>
            </a>
          </li>
          <li id="link9">
            <a href="./users.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Users</p>
            </a>
          </li>
          <!--
          <li>
            <a href="./user.html">
              <i class="tim-icons icon-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="tim-icons icon-align-center"></i>
              <p>Typography</p>
            </a>
          </li>
          <li>
            <a href="./rtl.html">
              <i class="tim-icons icon-world"></i>
              <p>RTL Support</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="tim-icons icon-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li>
        -->
        </ul>
      </div>
    </div>

    <script type="text/javascript">
      window.addEventListener('load',function(){
        var pageT = <?php echo "'".$pages."'"; ?>;
      if(pageT=='page1'){
        document.getElementById('link1').className = 'active';
      }

      if(pageT=='page2'){
        document.getElementById('link2').className = 'active';
      }

      if(pageT=='page3'){
        document.getElementById('link3').className = 'active';
      }

      if(pageT=='page4'){
        document.getElementById('link4').className = 'active';
      }
      if(pageT=='page5'){
        document.getElementById('link5').className = 'active';
      }
      if(pageT=='page6'){
        document.getElementById('link6').className = 'active';
      }
      if(pageT=='page9'){
        document.getElementById('link9').className = 'active';
      }
      if(pageT=='page10'){
        document.getElementById('link10').className = 'active';
      }
      if(pageT=='page11'){
        document.getElementById('link11').className = 'active';
      }
    });
     
    </script>