<?php
$datef = $_GET['date'];

include 'includes/database.php';
include 'includes/action.php';

$query = "SELECT p.Production_ID,p.Date,p.NumberOfEggs,p.Numbercrack, DATE_FORMAT(p.Date,'%b %d %Y') FROM production p WHERE p.Date LIKE '%$datef%' order by p.date desc";
$hasres = hasResults($query);


 ?>

<div style="padding-top: 50px;">

<table>
                    <thead>
                        <th>Date</th>
                        <th>Number of Good Eggs</th>
                        <th>Number of Cracked Eggs</th>
                        <th>Total of Eggs produced</th>
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
                            // breaking point

                            $totalegg = $row[2] + $row[3];

                            ?>
                            <tr>
                                <td><?php echo $row[4];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row[3];?></td>
                                <td><?php echo $totalegg;?></td>
                                <td>
                                    
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure to remove this record to the list?\n\nCick okay to proceed✔️\nClick cancel if you are not sure❌')" class="del_btn" href="includes/action.php?productiondelete=1&id=<?php echo $row["Production_ID"]; ?>">Delete</a>
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