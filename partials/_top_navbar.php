<?php $uuiid = $_SESSION['uid']; ?>


<?php
if($uuiid==10){
 ?>


<nav class="navbar" style="">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a href="eggsSummary.php" id="n1" class="toplink" onclick="toggle()">Eggs</a>
          <a href="birdsSummary.php" id="n2" class="toplink" onclick="toggle()">Chicken</a>
          <a href="feedSummary.php" id="n3" class="toplink">Feed</a>
        </div>
        <div class="navbar__right">
            <h1 style="font-size: 15px; color: green; color: #2e4a66; margin-right: 10px;"><?php echo 'Logged in as ' . $_SESSION["Username"]; ?></h1>
        </div>
      </nav>

    <?php } ?>


      <style type="text/css">
        .navact{
          background-color: red;
          color: white;
          border-radius: 5px;
        }
        .toplink{padding-top: 3px; padding-bottom: 3px;padding-left: 3px; padding-right: 3px;}
      </style>



<script type="text/javascript">
  var act = <?php echo $_SESSION['activel']; ?>;
  if(act==101){
    document.getElementById('n1').className = "toplink navact";
  }
  if(act==102){
    document.getElementById('n2').className = "toplink navact";
  }
  if(act==103){
    document.getElementById('n3').className = "toplink navact";
  }
</script>