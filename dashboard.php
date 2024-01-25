<?php
    
    session_start();
    $_SESSION['activel'] = "0";
    $uid = $_SESSION['uid'];
    if($uid!=2){
        header("refresh:0;url=pos.php");
    }
    if (!isset($_SESSION['Username'])) {
        header("Location: index.php");
        exit();
    }
    include 'includes/database.php';
    include 'includes/action.php';
    
    function getNameOfUser($id){
        $sql = "select * from user where User_Id =  $id";
        $res = queryx($sql);
        $ret = "";
        if($col = getData($res)){
            $ret = $col[4];
        }
        return $ret;
    }


   


    function allEggs(){
        $res = queryx("SELECT SUM(i.quantity) FROM inventory i");
        $ret = 0;
        if($colx = getData($res)){
            $ret = $colx[0];
        }
        return $ret;
    }
    function allChicken(){
        $res = queryx("SELECT SUM(b.NumberOfBirds)'pur' FROM birdspurchase b");
        $ret = 0;
        if($colx = getData($res)){
            $ret = $colx[0];
        }
        return $ret;
    }
    function allDead(){
        $res = queryx("SELECT SUM(b.Deaths)'ded' FROM birdsmortality b");
        $ret = 0;
        if($colx = getData($res)){
            $ret = $colx[0];
        }
        return $ret;
    }
    function allEggSales(){
        $res = queryx("SELECT SUM(t.quantity) FROM transaction t");
        $ret = 0;
        if($colx = getData($res)){
            $ret = $colx[0];
        }
        return $ret;
    }

    function allConsumed(){
        $res = queryx("SELECT SUM(f.Quantity) FROM feedconsumption f");
        $ret = 0;
        if($colx = getData($res)){
            $ret = $colx[0];
        }
        return $ret;
    }

function hasSched(){
        $nowDate = mysqlDateNew();
        $sql = "SELECT * FROM mapping m WHERE m.vac_date LIKE '%$nowDate%'";
        $ret = 0;
        $res = setQuery($sql);
        if($col = getData($res)){
            $ret = 1;
        }
        else{
            $ret = 0;
        }
        return $ret;
    }

if(hasSched()==0){

}
else{
?>
<div class="pop" id="pop" style="" align="center">
    <div>
        <div class="popup-body">
            <div class="heading">
                <span>Schedule for today</span>
            </div>
            <div class="content">
                <table style="width: 700px;">
                    <tr></tr>
                    <?php 
                    $nowDate = mysqlDateNew();
                    $sql = "SELECT m.map_id,h.house_name,v.vac_name,m.vaccine_qty,m.vac_date,m.vac_next FROM mapping m, vaccines v,housing h WHERE m.house_id = h.house_id AND m.vaccine_id = v.vac_id and m.stat = 0 AND m.vac_date like '%$nowDate%' ORDER BY m.vac_date asc";
                    $res = setQuery($sql);
                    while($cc = getData($res)){
                     ?>
                    
                    <tr>
                        <td><?php echo $cc[1]; ?></td>
                        <td><?php echo $cc[2]; ?></td>
                        <td><?php echo $cc[3]; ?></td>
                        <td><?php echo $cc[4]; ?></td>
                    
                    </tr>
                    <?php
                }
                     ?>
                </table>
            </div>
            <div>
                <div>
                    <button class="okaybtn" onclick="document.getElementById('pop').style.display='none';">OKAY</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
    
    
?>




<style type="text/css">
    .pop{
        width: 100%;
        height: 100%;
        position: fixed;
        right: 0;
        top: 0;
        background-color: rgb(0,0,0,0.5);
        padding-top: 100px;
    }
    .popup-body{
        display: inline-block;
        background-color: white;
        border-radius: 5px;
        padding:25px 20px 25px 20px;
    }
    .heading span{
        font-size: 18px;
    }
    .okaybtn{
        width: 100px;
        height: 30px;
        border-radius: 5px;
        border:solid 1px #d6d6d6;
        cursor: pointer;
    }
</style>


<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "partials/_head.php";?>
<body id="body">
    <div class="container">
        <!-- top navbar -->
        <?php include "partials/_top_navbar.php";?>
        <main>
            <div class="main__container">
                <!-- dashboard title and greetings -->
                <div class="main__title">
                    <!-- <img src="images/hello.svg" alt=""> -->
                    <div class="main__greeting">
                        <h1>Hello<?php echo ' ' . getNameOfUser($uid) . '.';?></h1>
                        <p>Welcome to your dashboard</p>
                    </div>
                </div>
                <!-- dashboard title ends here -->

                <!-- Cards for displaying CRUD insights -->
                <div class="main__cards">
                    <div class="card">
                        <div class="card_inner">
                            <p class="text-primary-p">Total chicken purchased</p>
                            <!-- <span class="font-bold text-title">578</span> -->
                            <span class="font-bold text-title">
                                <?php
                                    echo allChicken();
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card_inner">
                            <p class="text-primary-p">Dead chicken recorded</p>
                            <!-- <span class="font-bold text-title">578</span> -->
                            <span class="font-bold text-title">
                                <?php
                                    echo allDead();
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card_inner">
                            <p class="text-primary-p">Total eggs produced</p>
                            <!-- <span class="font-bold text-title">578</span> -->
                            <span class="font-bold text-title">
                                <?php
                                    echo allEggs();
                                ?>
                            </span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card_inner">
                            <p class="text-primary-p">No. of Managers</p>
                            <!-- <span class="font-bold text-title">578</span> -->
                            <span class="font-bold text-title">
                                1
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End of cards for displaying CRUD insights -->
                <!-- Start of charts for displaying CRUD insights -->
                <div class="charts">
                    <div class="charts__left">
                        <div class="charts__left__title">
                            <div>
                                <h1>Vaccine schedules</h1>
                                <p></p>
                            </div>
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div>
                            <div>
                                <select id="vstat" onchange="showVac()">
                                    <option value="1">Pending</option>
                                    <option value="2">Done</option>
                                </select>
                            </div>
                        </div>
                        <div id="vac">
                            
                        </div>
                    </div>

                    <div class="charts__right">
                        <div class="charts__right__title">
                            <div>
                                <h1>Stats</h1>
                                <p>Statistics of different categories</p>
                            </div>
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>

                        <div class="charts__right__cards">
                            <div class="card1">
                            <h1>Eggs sold</h1>
                            <p><?php echo allEggSales(); ?></p>
                        </div>

                        <div class="card2">
                            <h1>Eggs left</h1>
                            <p><?php 
                            $left = allEggs() - allEggSales();
                            echo $left;
                            ; ?></p>
                        </div>

                        <div class="card3">
                            <h1>Chicken alive</h1>
                            <?php
                                $lf = allChicken() - allDead();
                                echo $lf;
                                ?>
                        </div>

                        <div class="card4">
                            <h1>Total feed consumed</h1>
                            <?php
                                echo allConsumed().' sacks';
                                ?>
                        </div>
                    </div>
                </div>
                <!-- End of charts for displaying CRUD insights -->
            </div>
        </main>
        <!-- sidebar nav -->
        <?php include "partials/_side_bar.php";?>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
    <script src="script.js"></script>
</body>
</html>

<style type="text/css">
    .status{
        width: 100px;
        padding-top: 3px;
        padding-bottom: 3px;
        border:none;
        border-radius: 5px;
    }
    .pending{
        background-color: #ffd1b3;
    }
    .done{
        background-color: #b3ffb8;
    }
    #vstat{
        outline: none;
        width: 200px;
    }
</style>
<script type="text/javascript">
    function showVac(){
        var vstat = document.getElementById('vstat').value;
        var xml = new XMLHttpRequest();
        xml.onload = function(){
            document.getElementById('vac').innerHTML = this.responseText;
        }
        xml.open("GET","dashvac.php?q="+vstat);
        xml.send();
    }
    showVac();
</script>