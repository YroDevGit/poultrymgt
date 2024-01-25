<?php
$datef = $_GET['date'];

include 'includes/database.php';
include 'includes/action.php';

$query = "SELECT v.vac_id,v.vac_name,v.vac_price,v.vac_qty, DATE_FORMAT(v.vac_date,'%M %d %Y') FROM vaccines v WHERE v.vac_date LIKE '%$datef%' order by v.vac_date desc";
$hasres = hasResults($query);


 ?>

<div style="padding-top: 50px;">

<table>
                    <thead>
                        <th>Date purchase</th>
                        <th>Vaccine name</th>
                        <th>Price each</th>
                        <th>Vaccine count</th>
                        
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    <?php

                        if($hasres==0){
                            ?>

                            <tr>
                                <td colspan="4" align="center" style="padding-top: 15px; padding-bottom: 15px;">No Data found</td>
                            </tr>

                            <?php
                        }
                        else{
                        // calling viewMethod() method
                        $myrow = $productionObject->setQuery($query);

                        foreach($myrow as $row){
                           

                           

                            ?>
                            <tr>
                                <td><?php echo $row[4]?></td>
                                <td><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row[3]?></td>
                                
                                <td>
                                    <a onclick="return confirm('Are you sure to remove this record to the list?\n\nCick okay to proceed✔️\nClick cancel if you are not sure❌')" class="del_btn" href="?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>


            </div>
            <style type="text/css">
                th{
                    background-color: #d69494;
                    color: white;
                }
                table{
                    border:solid 1px #d69494;
                }
            </style>