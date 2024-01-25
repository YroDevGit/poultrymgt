<?php

    session_start();
    $cartstat =0;
    $uid = $_SESSION['uid'];
    $_SESSION['activel'] = "9";
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

   
    $dat = Date("ydmGis");
    $arr = array("1","2","3","4","5","6","7","8","9","0","T","Y","R","O","N","E","M","A","L","O","C","I");
    $ax = array("A","B","C","D","Z","X","W");
    shuffle($ax);
    shuffle($arr);
    $cust = $ax[2].$ax[3].$arr[0].$arr[1].$arr[2].$arr[3].$arr[4].$arr[5].$arr[6].$arr[7].$arr[8].$arr[9].$dat.$ax[0].$ax[1];
?>
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
                        <h1>Hello<?php echo ', ' . getNameOfUser($uid) . '.';?></h1>
                        <p>Welcome to your dashboard</p>
                    </div>
                </div>
                <!-- dashboard title ends here -->

                <!-- Cards for displaying CRUD insights -->
                

                    

                    
                </div>
                <!-- End of cards for displaying CRUD insights -->
                <!-- Start of charts for displaying CRUD insights -->
                <div class="charts">
                    <div class="charts__left">
                        <div class="charts__left__title">
                            <div>
                                <h1>Puchase details</h1>
                                <p></p>
                            </div>
                        
                        </div>
                        <form method="post" action="includes/act.php">

                        <div id="" style="padding-top: 15px; padding-bottom: 25px; position: relative;">
                            <?php
                            $sql = "select sum(quantity) from transaction where stat = 0 and user = $uid";
                            $rest = queryx($sql);
                            if($cols = getData($rest)){
                                if(is_null($cols[0])){
                                    $cartstat=0;
                                   ?>
                                   <button class="cart-btnx" type="button"><i class="fa fa-shopping-cart"><span><?php echo $cols[0]; ?></span></i></button>
                                <?php
                                }

                                else{
                                    $cartstat=1;
                                ?>
                                <button class="cart-btn" type="button"><i class="fa fa-shopping-cart"><span><?php echo $cols[0]; ?></span></i></button>
                                <?php 
                            }
                            }
                            

                             ?>
                            

                            <div align="center">
                                <div class="main-title">
                                    <span>Point of sales</span>
                                </div>
                            </div>
                            
                            <table class="tab" >
                                <tr style="border:none;" id="err">
                                    <td colspan="2" align="center" class="for-error"><label>Please Select Egg size first</label></td>
                                </tr>
                               <tr>
                                    <td class="first"><label>Egg type: </label></td>
                                    <td>
                                       <?php showEggTypes('etype','inp','noid1'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><label>Egg size: </label></td>
                                    <td>
                                       <?php showEggSize('esize','inp','noid2'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><label>Stocks: </label></td>
                                    <td><input class="inp" id="stocks" readonly="" required=""></td>
                                </tr>
                                <tr>
                                    <td class="first"><label>Price per trays: </label></td>
                                    <td><input class="inp" id="p" onkeyup="sreset()" name="pr" required=""></td>
                                </tr>
                                <tr>
                                    <td class="first"><label>Trays: </label></td>
                                    <td><input type="number" class="inp" required="" id="t" onkeyup="getTotal()" onchange="getTotal()" name="qt" max="0" readonly="" placeholder="Enter price first"></td>
                                </tr>
                                <tr>
                                    <td class="first"><label>Total: </label></td>
                                    <td><input class="inp" readonly="" id="tl" type="numer" name="tot" required="true"></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2" align="center"><button class="bbtt" type="submit" name="sub" onclick="return confirm('Proceed?')">Add to cart</button></td>
                                </tr>
                            </table>
                        
                        </div>
                        </form>
                    </div>
                   
                    <div class="charts__right">
                        <div class="charts__right__title">
                            <div>
                                <h1>Cart</h1>
                              
                            </div>
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>

                        <div class="charts__right__cards">
                            <div class="card1">
                            <table style="width: 90%;">
                                <tr>
                                    <th class="th">Egg type</th>
                                    <th class="th">Egg size</th>
                                    <th class="th">Price</th>
                                    <th class="th">Quantity</th>
                                    <th class="th">Total</th>
                                    <th class="th"></th>
                                </tr>
                                <tbody>
                                    <?php
                                    $sqlx = "SELECT e.mname, t.price, t.quantity, t.total, e.id, z.size_name,t.id,z.size_id  FROM transaction t, eggs e, egg_size z WHERE t.egg_type = e.id AND t.egg_size = z.size_id AND t.`user` = $uid AND t.stat = 0";
                               
                                    $resx = queryx($sqlx);
                                    $grand = 0;
                                    while($xol = getData($resx)){
                                        $col1 = $xol[0];
                                        $col2 = $xol[1];
                                        $col3 = $xol[2];
                                        $col4 = $xol[3];
                                        $colid = $xol[4];
                                        $grand += $col4;
                                        $sid = $xol[7];
                                        $transid=$xol[6];

                                        ?>
                                        <tr>
                                            <td><?php echo $col1; ?></td>
                                            <td><?php echo $xol[5]; ?></td>
                                            <td><?php echo $col2; ?></td>
                                            <td><?php echo $col3; ?></td>
                                            <td><?php echo "₱".$col4; ?></td>
                                            <td><form method="post" style="width: auto;margin: auto;padding: 0px;border:none;">

                                                    <input type="hidden" name="nid" value="<?php echo $transid; ?>">
                                                 
                                                   
                                                <button name="rembtn" type="submit"  class="rembtn">X</button></form><?php
                                                if(isset($_POST['rembtn'])){
                                                    $trans = $_POST['nid'];
                                                    $sxq = "delete from transaction where id = $trans";
                                                   
                                                    queryx($sxq);

                                                    ?>
                                                        <script type="text/javascript">
                                                            window.location.href = window.location.href;

                                                        </script>
                                                    <?php
                                                }

                                             ?></td>
                                        </tr>
                                        <?php
                                    }

                                    ?>
                                    <tr>
                                            <td><b class="gr"><?php echo "Grand total"; ?></b></td>
                                            <td><?php echo ""; ?></td>
                                            <td><?php echo ""; ?></td>
                                            <td><?php echo ""; ?></td>
                                            <td><b class="gr"><?php echo "₱".$grand; ?></b></td>


                                    </tr>
                                    <?php

                                     ?>
                                </tbody>
                            </table>
                            <?php
                            if($cartstat==1){
                                ?>
                                <div align="left" style="padding-left: 20px;"><span>Amount tendered: </span><input type="hidden" id="total" value="<?php echo $grand; ?>" name=""><input type="number" class="inp tend" name="" id="amount"><button onclick="getChange()" class="imp btnn">Pay</button></div>
                                <div align="right" style="padding-top: 30px;">
                                    <span id="change">---</span>
                                </div>
                                <?php
                            }

                             ?>
                        </div>


                        

                       
                    </div>
                   <?php
                   if($cartstat==1){
                    ?>
                     <div class="card3" id="card3" style="margin-top: 5px; display: none;">
                            <div>
                                <form style="padding: 0px;margin: 0px;width: auto;border: none;" method="post" action="includes/act.php" >
                                    <table>
                                    <tr class="no-effect">
                                        <td>Customer: </td>
                                        <td><input type="" name="cust" class="inp" placeholder="Enter fullname" required="">
                                        <input type="hidden" name="change1" id="change1">
                                        <input type="hidden" name="amount1" id="amount1">
                                        </td>
                                    </tr>
                                    <tr class="no-effect">
                                        <td>Date: </td>
                                        <td><input type="datetime-local" name="datex" class="inp"  required="" value="<?php echo getToday(); ?>"></td>
                                        <input type="hidden" name="tcode" value="<?php echo $cust; ?>">
                                    </tr>
                                    <tr class="no-effect">
                                        <td colspan="2" align="center">
                                            <button type="button"  class="bbtt" onclick="document.getElementById('moda').style.display='';">Check out</button>
                                        </td>
                                    </tr>
                                </table>
                                <div class="moda" id="moda" style="display: none;">
                                    <div align="center">
                                        <div class="cardx"> 
                                            <div class="trow"><span>Are you sure to proceed?</span></div>
                                            <div class="trow">
                                                <button type="button" onclick="document.getElementById('moda').style.display='none';" class="bbtn btn-red">No</button>
                                                <button type="submit" name="bbtt" class="bbtn btn-submit">Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    <?php
                   }

                    ?>
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

                            .inp{width: 400px;height: 40px;border:solid 1px #d4d4d4;border-radius: 5px;padding-left: 10px;font-size: 16px;outline: none;}
                            .tab tr td{border:none;padding-top: 8px; padding-bottom: 8px; }
                            .tab{width: 100%;}
                            .first{text-align: left;}

                            .bbtt{
                                width: 120px;
                                height: 33px;
                                border:solid 1px #e3e3e3;
                                position: relative;
                                z-index: 1;
                                border-radius: 5px;
                                cursor: pointer;
                            }
                            .bbtt:before{
                                content: '';
                                position: absolute;
                                top: 50%;
                                bottom: 50%;
                                right: 50%;
                                left: 50%;
                                transition: 0.5s;
                                z-index: -1;
                                background-image: linear-gradient(to right,#0ff554,#0ff5c7,#f1f50f,#0ff5c7,#0ff554);
                            }
                            .bbtt:hover:before{
                                top: 0;
                                bottom: 0;
                                left: 0;
                                right: 0;
                            }
                            .gr{
                                font-size: 20px;
                            }
                            .th{
                                font-size: 20px;
                                background-color: #a16363;
                                color: white;
                            }

                            .for-error label{color: red;}
                            .main-title{font-size: 20px; font-weight: 900; font-family: cursive;}
                            .cart-btn, .cart-btnx{height: 30px;width: 100px;border:none;background-color: transparent;position: absolute;top: 10px;right: 5px; cursor: pointer;}
                            .cart-btn i{font-size: 25px;color: red;}
                            .cart-btnx i{font-size: 25px;color:black;}
                            .card1{width: 190%;padding: 15px;}
                            .no-effect:hover{
                                background-color: transparent;

                            }
                            .no-effect{border:none;}
                            .tend{
                                width: 30%;
                                text-align: right;
                            }
                            .imp{
                                width: 400px;height: 40px;border:solid 1px #d4d4d4;border-radius: 5px;font-size: 16px;outline: none;
                                cursor: pointer;
                            }
                            .btnn{
                                width: 15%;
                                text-align: center;
                            }
                            .rembtn{
                                background-color: transparent;border:none;cursor: pointer;
                                font-size: 17px;
                            }
                            .rembtn:hover{color: red;}
                            .moda{
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgb(0,0,0,0.6);
                                z-index: 10000;
                                padding-top: 10%;
                            }
                            .moda div{}
                            .cardx{
                                background-color: white;
                                width: 30%;
                                border-radius: 10px;
                                padding-top: 20px;
                                padding-bottom: 20px;
                            }
                            .bbtn{
                                width: 100px;
                                height: 30px;
                                font-size: 17px;
                                border-radius: 5px;
                                border:none;
                                cursor: pointer;
                            }
                            .bbtn:hover{
                                background-color: orange;
                            }
                            .btn-red{
                                background-color: #ff837a;
                            }
                            .btn-submit{background-color: #91ff7a;}
                            .trow{
                                padding-top: 10px;
                                padding-bottom: 10px;
                            }
                            .trow span{font-size: 19px;}

                    </style>

<script type="text/javascript">
    function showP(){
        var vvx = document.getElementById('typex').value;
        if(vvx==""){
            document.getElementById('err').style.display = '';
            document.getElementById('c1').innerHTML = "";
            document.getElementById('c2').innerHTML = "";
            document.getElementById('purch').disabled = true;
        }
        else{
        document.getElementById('purch').disabled = false;
        document.getElementById('err').style.display = 'none';
        showPrice();
        showQty();
        setTimeout(limit,200);
    }
    document.getElementById('purch').value=0;
    }
    function showPrice(){
        var vax = document.getElementById('typex').value;
        var x = new XMLHttpRequest();
        x.onload = function(){
            document.getElementById('c1').innerHTML = this.responseText;
        }
        console.log(vax);
        x.open("GET","ext.php?type=1&id="+vax);
        x.send();
        
    }
    function showQty(){
        var vax = document.getElementById('typex').value; 
        var x = new XMLHttpRequest();
        x.onload = function(){
            document.getElementById('c2').innerHTML = this.responseText;
        }
        console.log(vax);
        x.open("GET","ext.php?type=2&id="+vax);
        x.send();
        
    }

    function nm(vr) {
            document.getElementById(vr).innerHTML = "";
        
    }

    function limit(){
        var pi = document.getElementById('stock').value;
        document.getElementById('purch').max = pi;
    }

    function getT(){
        var a = document.getElementById('pr').value;
        var b = document.getElementById('purch').value;
        var c = parseInt(a) * parseInt(b);
        document.getElementById('tt').value = c;
    }

    function getChange(){
        var v1 = parseInt(document.getElementById('total').value);
        var v2 = parseInt(document.getElementById('amount').value);
        if(v1>v2){
            document.getElementById('change').innerHTML = "<span style='color:red;font-size:20px;'>Insufficient amount</span>";
            document.getElementById('card3').style.display= 'none';
        }
        else{
            var v3 = v2 - v1;
            document.getElementById('change').innerHTML = "<span style='color:green;font-size:25px;'>CHANGE: ₱"+v3+"</span>";
            document.getElementById('card3').style.display= '';
            document.getElementById('change1').value = v3;
            document.getElementById('amount1').value= v2;
        }
    }

    function getTotal(){
        var check = document.getElementById('t').value;
        var p1 = parseInt(document.getElementById('p').value);
        if(check==""){
            document.getElementById('tl').value="";
        }
        else{
        
        var p2 = parseInt(check);
        var p3 = p1 * p2;
        document.getElementById('tl').value=p3;
    }

    }
    function sreset(){
        document.getElementById('t').value = '';
        document.getElementById('tl').value = '';
        if(isEmpty(document.getElementById('p').value)){
                document.getElementById('t').readOnly = true;
                document.getElementById('t').placeholder = "Enter price first";
        }
        else{
            document.getElementById('t').readOnly = false;
            document.getElementById('t').placeholder = "";
        }
    }
    function allReset(){
        sreset();
        document.getElementById('p').value = '';
        document.getElementById('tl').value = '';
        document.getElementById('t').readOnly = true;
    }
    document.getElementById('noid1').onchange = function(){
        allReset();
        getStocks();
    }
    document.getElementById('noid2').onchange = function(){
        allReset();
        getStocks();
    }

    function getStocks(){
        var v1 = document.getElementById('noid1').value;
        var v2 = document.getElementById('noid2').value;
        if(v1==""){
            v1 = 0;
        }
        if(v2==""){
            v2 = 0;
        }
        
        var xml = new XMLHttpRequest();
        xml.onload = function(){
            var maxix = this.responseText;
            var mx = parseInt(maxix);
            document.getElementById('stocks').value = mx;
        }
        xml.open("GET","ext.php?type=5&id=2&sz="+v2+"&tp="+v1);
        xml.send();
        setTimeout(setMax,500);
    }
    function setMax(){
        document.getElementById('t').max =document.getElementById('stocks').value;
    }
    function isEmpty(str) {
    return !str.trim().length;
}
</script>