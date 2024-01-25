<?php
$val1 = $_GET['val1'];
$val2 = $_GET['val2'];
include '../../../includes/database.php';
include '../../../includes/func.php';
$db7 = new Database();
$sql = "";
if($val1=="" || $val2 == ""){
  $sql = "SELECT t.id,t.customer,e.mname,s.size_name, t.price,t.quantity,t.total,DATE_FORMAT(t.ddate,'%M %d %Y'),u.uname FROM transaction t, user u, eggs e, egg_size s WHERE t.`user` = u.User_ID AND t.egg_type = e.id AND t.egg_size = s.size_id AND t.ddate LIKE '%$val1%'";
}
else{
  $sql = "SELECT t.id,t.customer,e.mname,s.size_name, t.price,t.quantity,t.total,DATE_FORMAT(t.ddate,'%M %d %Y'),u.uname FROM transaction t, user u, eggs e, egg_size s WHERE t.`user` = u.User_ID AND t.egg_type = e.id AND t.egg_size = s.size_id AND (t.ddate > '$val1 00:00:00' and t.ddate< '$val2 23:59:00')";
}


$res = mysqli_query($db7->connect(),$sql);
$grand = 0;
while($cox=mysqli_fetch_array($res)){
$gtotal = $cox[6];
$totax = $cox[4];
$grand += $gtotal;

 ?>                      



                      <tr>
                        <td>
                          <?php echo $cox[0]; ?>
                        </td>
                                                <td>
                          <?php echo $cox[2]; ?>
                        </td>
                        <td>
                          <?php echo $cox[8]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[3]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo "₱".$totax; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[5]; ?>
                        </td>
                        <td>
                          <?php echo "₱".$gtotal; ?>
                        </td>
                        <td>
                          <?php echo $cox[7]; ?>
                        </td>
                        <td>
                          <?php echo $cox[1]; ?>
                        </td>

                      </tr>
  
  <?php
}
   ?>
  <tr>
    <td colspan="1000"></td>
  </tr>

   <tr >
     <td style="border: none;" colspan="7" align="right"><b style=""><?php echo "Grand total: ₱".$grand; ?></b></td>
   </tr>