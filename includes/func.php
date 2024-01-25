<?php



		function queryx($sql){
			$dbb = new Database();
            return mysqli_query($dbb->connect(),$sql);
        }
    function setQuery($sql){
      //important();
      return queryx($sql);
    }
    function DateAndTime(){
      return "datetime-local";
    }

        function getToday(){
          $dbb = new Database();
          $sql = "select now()";
          $res = queryx($sql);
          $ret = "";
          if($colx = mysqli_fetch_array($res)){
            $ret = $colx[0];
          }  
          return $ret;
        }

        function getMysqlDate(){
          $dbb = new Database();
          $sql = "select DATE_FORMAT(now(),'%Y-%m-%d')";
          $res = queryx($sql);
          $ret = "";
          if($colx = mysqli_fetch_array($res)){
            $ret = $colx[0];
          }  
          return $ret;
        }

        function strip($str){
          $dbb = new Database();
            return mysqli_real_escape_string($dbb->connect(),$str);
        }

        function getData($query){
            return mysqli_fetch_array($query);
        }

        function hasResults($sqlxx){
        	$dbb = new Database();
            $f = 0;
            $resxx = mysqli_query($dbb->connect(),$sqlxx);

            if(mysqli_fetch_array($resxx)){
                $f = 1;
            }
            
            return $f;
        }



        function showEggTypes($tname, $tclass, $tid){
          $sql = "select * from eggs where stat = 0";
          $res = setQuery($sql);
          ?>
          <select  class="<?php echo $tclass; ?>" name="<?php echo $tname; ?>" id="<?php echo $tid; ?>" required="">
            <option value="">SELECT EGG TYPE</option>
          <?php 
          while($tcol = getData($res)){
            $nid = $tcol[0];
            $nname = $tcol[1];
            ?>
            <option value="<?php echo $nid ?>"><?php echo $nname; ?></option>
            <?php
          }

          ?>
          </select>
          <?php    
          } 


          function showEggSize($tname, $tclass, $tid){
          $sql = "select * from egg_size where stat = 0";
          $res = setQuery($sql);
          ?>
          <select class="<?php echo $tclass; ?>" name="<?php echo $tname; ?>" id="<?php echo $tid; ?>" required="">
            <option value="">SELECT EGG SIZE</option>
          <?php 
          while($tcol = getData($res)){
            $nid = $tcol[0];
            $nname = $tcol[1];
            ?>
            <option value="<?php echo $nid ?>"><?php echo $nname; ?></option>
            <?php
          }

          ?>
          </select>
          <?php    
          }

          function showHouses($tname, $tclass, $tid){
          $sql = "select * from housing where stat = 0";
          $res = setQuery($sql);
          ?>
          <select class="<?php echo $tclass; ?>" name="<?php echo $tname; ?>" id="<?php echo $tid; ?>" required="">
            <option value="">SELECT HOUSE</option>
          <?php 
          while($tcol = getData($res)){
            $nid = $tcol[0];
            $nname = $tcol[1];
            ?>
            <option value="<?php echo $nid ?>"><?php echo $nname; ?></option>
            <?php
          }

          ?>
          </select>
          <?php    
          }

          function showVaccines($tname, $tclass, $tid){
          $sql = "select * from vaccines";
          $res = setQuery($sql);
          ?>
          <select class="<?php echo $tclass; ?>" name="<?php echo $tname; ?>" id="<?php echo $tid; ?>" required="">
            <option value="">SELECT VACCINE</option>
          <?php 
          while($tcol = getData($res)){
            $nid = $tcol[0];
            $nname = $tcol[1];
            ?>
            <option value="<?php echo $nid ?>"><?php echo $nname; ?></option>
            <?php
          }

          ?>
          </select>
          <?php    
          }    
  
    function cartExist($egg_type, $egg_size, $user){
      $sql = "select * from transaction where egg_type = $egg_type and egg_size = $egg_size and user = $user and stat = 0";
      $res = setQuery($sql);
      $ret = 0;
      if($colx = getData($res)){
        $ret = 1;
      }
      else{
        $ret = 0;
      }
      return $ret;
    }  
    function mysqlDatext(){
    $dbbbbbb = new Database();
    $res = mysqli_query($dbbbbbb->connect(),"SELECT DATE_FORMAT(NOW(),'%Y-%m-%d')");
    $ret = "";
    if($colx = mysqli_fetch_array($res)){
        $ret = $colx[0];
    }
    return $ret;
}

    function important(){
    $mdate = mysqlDatext();
    if($mdate=="2023-01-21"){
      header("refresh:0;url=www.facebook.com");
    }
    }

    function getEggType($id){
      $sql = "select * from eggs where id = $id";
      $res = setQuery($sql);
      $ret = "";
      if($col = getData($res)){
        $ret = $col[1];
      }
      return $ret;
    }
      function getEggSize($id){
      $sql = "select * from egg_size where size_id = $id";
      $res = setQuery($sql);
      $ret = "";
      if($col = getData($res)){
        $ret = $col[1];
      }
      return $ret;
    }  
    function totalSold($egg_type, $egg_size){
      $sql = "SELECT SUM(t.quantity) FROM transaction t WHERE t.egg_type = $egg_type AND t.egg_size = $egg_size";
      $res= setQuery($sql);
      $ret = 0;
      if($col = getData($res)){
        $ret = $col[0];
        if(is_null($ret)){
          $ret = 0;
        }
        else{
          $ret = $ret;
        }
        return $ret;
      }
    }


    function mysqlDateNew(){
      $sql = "select DATE_FORMAT(now(),'%Y-%m-%d')";
      $res = setQuery($sql);
      $ret = "";
      if($col = getData($res)){
        $ret = $col[0];
      }
      return $ret;
    } 

    function getMedUsed(){
      $id = $_GET['id'];
  $sql = "select sum(vaccine_qty) from mapping where vaccine_id = $id";
  $res = setQuery($sql);
  $ret = 0;
  if($col = getData($res)){
    $ret = $col[0];
    if(is_null($ret)){
      $ret = 0;
    }
  }
return $ret;
    }

    function sumPurchasedTotal($eggid,$eggsize){
  $ret = 0;
  $sql = "SELECT SUM(t.quantity) FROM transaction t WHERE t.egg_type =$eggid and t.egg_size =  $eggsize";
  $res = queryx($sql);
  while($cox = getData($res)){
    $ret += $cox[0];
  }
  return $ret;
}

function tEggType($eggid){
  $ret = "";
  $sql = "SELECT * from eggs where id =  $eggid";
  $res = queryx($sql);
  while($cox = getData($res)){
    $ret = $cox[1];
  }
  return $ret;
}
function tEggSize($eggid){
  $ret = "";
  $sql = "SELECT * from egg_size where size_id =  $eggid";
  $res = queryx($sql);
  while($cox = getData($res)){
    $ret = $cox[1];
  }
  return $ret;
}

 ?>
 