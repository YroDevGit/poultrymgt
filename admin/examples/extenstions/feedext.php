<?php
$val = $_GET['val'];
include '../../../includes/database.php';
$db7 = new Database();

$sql = "SELECT * FROM feedpurchase where DATE like '%$val%' ORDER BY DATE desc";

$res = mysqli_query($db7->connect(),$sql);
while($cox=mysqli_fetch_array($res)){


 ?>                      



                      <tr>
                        <td class="text-center">
                          <?php echo $cox[0]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[1]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[2]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo "₱".$cox[3]; ?>
                        </td>
                        
                      </tr>
  
  <?php
}
   ?>