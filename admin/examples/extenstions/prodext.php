<?php
$val = $_GET['val'];
include '../../../includes/database.php';
$db7 = new Database();

$sql = "SELECT * FROM production p WHERE p.Date like '%$val%'";

$res = mysqli_query($db7->connect(),$sql);
while($cox=mysqli_fetch_array($res)){


 ?>                      



                      <tr>
                        <td>
                          <?php echo $cox[1]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[2]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[3]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[4]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[5]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[6]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[7]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[8]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[9]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[10]; ?>
                        </td>
                        <td class="text-center">
                          <?php echo $cox[11]; ?>
                        </td>
                      </tr>
  
  <?php
}
   ?>