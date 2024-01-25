<?php
session_start();
$_SESSION['activel'] = "1";
if (!isset($_SESSION['Username'])) {
    header("Location: index.php");
    exit();
}
include 'includes/database.php';
include 'includes/action.php';

?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include "partials/_head.php";?>
<body id="body">


<div>
                   <div class="modex" id="modex" style="display: none;">
                       <div>
                           
                           

                        
                            <form action="includes/action.php" method="post">
                                <div>
                               <div>
                                   <div class="forclose">
                                       <span id="close">X</span>
                                   </div>
                               </div>
                           </div>
                                <div class="input-group">
                                    <label for="">Date:</label>
                                    <input type="date" name="Date" value="" onclick="this.showPicker()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Time:</label>
                                    <input type="time" name="time" value="" onclick="this.showPicker()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b>Mini eggs</b>:</label>
                                    <input type="number" step="any" name="mini" id="mini" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b>Pewee eggs</b>:</label>
                                    <input type="number" step="any" name="pewee" id="pewee" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b>Small eggs</b>:</label>
                                    <input type="number" step="any" name="small" id="small" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b>Medium eggs</b>:</label>
                                    <input type="number" step="any" name="medium" id="medium" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b>Large eggs</b>:</label>
                                    <input type="number" step="any" name="large" id="large" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b> XL eggs</b>:</label>
                                    <input type="number" step="any" name="xl" id="xl" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b> Jumbo eggs</b>:</label>
                                    <input type="number" step="any" name="jumbo" id="jumbo" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b> Brook eggs</b>:</label>
                                    <input type="number" step="any" name="brook" id="brook" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of <b> Stain eggs</b>:</label>
                                    <input type="number" step="any" name="stain" id="stain" value="0" min="0" onchange="loaded()" required>
                                </div>
                                <div class="input-group">
                                    <label for="">Number of  <b>Cracked Eggs</b>:</label>
                                    <input type="number" step="any" name="NumberOfCrack" id="egg2" value="0" min="0" onchange="loaded()" required>
                                </div>
                               
                                <div class="input-group">
                                    <label for="">Number of <b>Good Eggs</b>:</label>
                                    <input type="number" readonly="" step="any" name="NumberOfEggs" id="egg1" value="0" min="0" onchange="loaded()" required>
                                </div>
                                
                                <div class="input-group">
                                    <label for="">Number of  <b>Total egg produced</b>:</label>
                                    <input type="number" step="any" name="totaleggs" id="totaleggs" value="0" readonly="" required>
                                </div>
                                <div class="input-group" align="center">
                                    <button type="submit" name="productionsave" class="btn widthplus2">Save</button>
                                </div>
                            </form>
                     


                       </div>
                   </div>
               </div>




































    <div class="container">
        <!-- top navbar -->
        <?php include "partials/_top_navbar.php";?>
        <main>

            <div style="margin-top: 20px; margin-right: 20px;">
                <div align="right">
                    <div>
                        <button class="addbtn" onclick="document.getElementById('modex').style.display = '';">Add/Update</button>
                    </div>
                </div>
            </div>


            <div>
                <div class="for-search" style="">
                    <div style="padding-bottom: 15px;"><input type="radio" name="bbox" id="cbox1" checked="" onclick="searchStat()"><label style="user-select: none;" for="cbox1"> Search by month</label><input style="margin-left: 20px;" type="radio" name="bbox" id="cbox2" onclick="searchStat()"><label style="user-select: none;" for="cbox2"> Search by day</label></div>
                    <span></span> <input type="month" class="search" onclick="this.showPicker()" name="" id="datef1" onchange="showEggsSearch()"> <a href="production.php" ><input type="date" class="search" onclick="this.showPicker()" name="" id="datef2" onchange="showEggsSearch()"> <a href="production.php" ><button style="height: 30px;border-radius: 5px; background-color: #30b04a;color: white; border:solid 1px #27a03f; width: 100px;cursor: pointer;" onclick="return confirm('Are you sure to reload the page?\nThis action will be undone.\nDo you want to proceed?')">RELOAD</button></a>

                </div>

            </div>
            <div class="main__container">



                <div id="getegg">
                    
                </div>
                
               


            </div>
        </main>
        <!-- sidebar nav -->
        <?php include "partials/_side_bar.php";?>
    </div>
    <script src=""></script>
    <script type="text/javascript">
        window.addEventListener("load",init);

        function searchStat(){
            document.getElementById('datef1').value="";
             document.getElementById('datef2').value="";
            if(document.getElementById('cbox1').checked){
                document.getElementById('datef1').style.display='';
                document.getElementById('datef2').style.display='none';
            }
            if(document.getElementById('cbox2').checked){
                document.getElementById('datef2').style.display='';
                document.getElementById('datef1').style.display='none';
            }
            showEggsSearch();
        }

        function checker(){
            var cc = 0;
            if(document.getElementById('cbox1').checked){
                cc =1;
            }
            if(document.getElementById('cbox2').checked){
                cc =2;
            }
            return cc;
        }

        function init(){
            loaded();
            showEggs();
            searchStat();
        }

        function loaded(){
            var a1 = document.getElementById('mini').value;
            var a2 = document.getElementById('pewee').value;
            var a3 = document.getElementById('small').value;
            var a4 = document.getElementById('medium').value;
            var a5 = document.getElementById('large').value;
            var a6 = document.getElementById('xl').value;
            var a7 = document.getElementById('jumbo').value;
            var a8 = document.getElementById('brook').value;
            var a9 = document.getElementById('stain').value;
            var tt = parseInt(a1)+parseInt(a2)+parseInt(a3)+parseInt(a4)+parseInt(a5)+parseInt(a6)+parseInt(a7)+parseInt(a8)+parseInt(a9);
            document.getElementById('egg1').value = tt; 

            var e1 = document.getElementById('egg1').value;
            var e2 = document.getElementById('egg2').value;
            var total = parseInt(e1) + parseInt(e2);

            document.getElementById('totaleggs').value = total;
        }

        document.getElementById('close').onclick = function(){
            document.getElementById('modex').style.display = 'none';
        }


        function showEggs(){
            var htp = new XMLHttpRequest();
            htp.onload = function(){
                document.getElementById('getegg').innerHTML = this.responseText;
            }
            htp.open("GET","eggtbl.php?date=");
            htp.send();
        }


        function showEggsSearch(){
            var cgc = checker();
            if(cgc==1){
                    var datef = document.getElementById('datef1').value;
            }
            if(cgc==2){
                    var datef = document.getElementById('datef2').value;
            }
            
            var htp = new XMLHttpRequest();
            htp.onload = function(){
                document.getElementById('getegg').innerHTML = this.responseText;
            }
            htp.open("GET","eggtbl.php?date="+datef);
            htp.send();
        }
    </script>
    <style type="text/css">
        .modex{
            z-index: 9999;
            position: fixed;
            background-color: rgb(0,0,0,0.5);
            width: 100%;
            height: 100%;
            overflow-y: auto;
        }
        form{
            background-color: white;
            width: 50%;
            margin-top: -0px;
        }
        .widthplus2{
            width: 150px;
            cursor: pointer;
        }
        .forclose{
            text-align: right;
        }
        .forclose span{
            font-size: 30px;
            font-family: monospace;
            color: #949494;
            cursor: pointer;
        }
        .addbtn{
            width: 170px;
            height: 35px;
            cursor: pointer;
            background-color: #30b04a;
            border:solid 1px #27a03f;
            border-radius: 5px;
            font-size: 16px;
            color: white;
        }
        .search{width: 200px;height: 30px; border-radius: 5px;outline: none;border:solid 1px #b9b6b6;padding-left: 5px;}
        .for-search{width: 50%;vertical-align: center;margin-left: 10px;position: absolute;margin-top: -40px;}
    </style>
</body>
</html>