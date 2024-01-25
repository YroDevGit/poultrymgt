<?php
$val = $_GET['q'];
include 'includes/database.php';
    include 'includes/action.php';

 ?>

<div id="piechart_3das" style="width: 750px; height: 250px;max-height: 250px;overflow-y: scroll;">
                            <table style="width: 100%;">
                                <tr></tr>
                                <?php
                                $sql = "";
                                if($val==1){
                                    $sql = "SELECT m.vac_date, v.vac_name, m.vaccine_qty, h.house_name, DATE_FORMAT(m.vac_date, '%M %d %Y'), m.map_id, DATE_FORMAT(m.vac_date,'%Y-%m-%d')'mapper'  FROM mapping m, vaccines v, housing h WHERE m.vaccine_id = v.vac_id and m.house_id = h.house_id and DATE_FORMAT(m.vac_date,'%Y-%m-%d') > DATE_FORMAT(now(),'%Y-%m-%d')";
                                }
                                else{
                                   $sql = "SELECT m.vac_date, v.vac_name, m.vaccine_qty, h.house_name, DATE_FORMAT(m.vac_date, '%M %d %Y'), m.map_id, DATE_FORMAT(m.vac_date,'%Y-%m-%d')'mapper' FROM mapping m, vaccines v, housing h WHERE m.vaccine_id = v.vac_id and m.house_id = h.house_id and DATE_FORMAT(m.vac_date,'%Y-%m-%d') <= DATE_FORMAT(now(),'%Y-%m-%d')"; 
                                }
                                $es = queryx($sql);
                                while($cox= getData($es)){
                                    $vname = $cox[1];
                                    $vqty = $cox[2];
                                    $vdate = $cox['mapper'];
                                    $mdate = mysqlDate();
                                    $mid = $cox['map_id'];

                                    $status = "";
                                    $marked = "";
                                    if($vdate<$mdate){
                                        $status = "Done";
                                        $marked = "done";
                                    }
                                    else if($vdate<=$mdate){
                                        $status = "Done";
                                        $marked = "done";
                                    }
                                    else{
                                        $status = "Pending";
                                        $marked = "pending";
                                    }

                                    ?>

                                <tr>
                                    <td class="sched"><?php echo $cox[4]; ?></td>
                                    <td class="sched"><?php echo $vname; ?></td>
                                    <td class="sched"><?php echo $vqty; ?></td>
                                    <td class="sched"><?php echo $cox[3]; ?></td>
                                    <td><?php
                                    if($val==1){
                                        ?>
                                        <a href="includes/vct.php?q=<?php echo $mid;  ?>"><button type="button" class="status <?php echo $marked; ?>"><?php echo $status; ?></button></a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button type="button" class="status <?php echo $marked; ?>"><?php echo $status; ?></button>
                                        <?php
                                    }
                                    ?></td>
                                </tr>
                                    <?php
                                }

                                 ?>
                                
                            </table>
                        </div>