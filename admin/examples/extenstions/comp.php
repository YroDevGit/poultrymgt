<?php
$val = $_GET['val'];
include '../../../includes/database.php';
$db7 = new Database();

$sql = "SELECT c.c_id,c.c_cust,DATE_FORMAT(c.c_date,'%M %d %Y')'fulldate',c.c_sack,c.c_price,c.c_sack * c.c_price 'total' FROM composetbl c WHERE c.c_date LIKE '%$val%' ORDER BY c.c_date desc";
$grand = 0;
$res = mysqli_query($db7->connect(),$sql);
while($cox=mysqli_fetch_array($res)){
$totax =$cox[5];
$grand += $totax;

 ?>                      



                      <tr>
                        <td>
                          <?php echo $cox[0]; ?>
                        </td>
                        <td>
                          <?php echo $cox[1]; ?>
                        </td>
                        <td>
                          <?php echo $cox[2]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[3]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo "₱".$cox[4]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo "₱".$totax; ?>
                        </td>
                        
                      </tr>
  
  <?php
}
   ?>

   <tr>
     <td align="right" colspan="1000"><b style="font-size: 20px;"><?php echo "Grand total: ₱".$grand; ?></b></td>
   </tr>