<?php
    include 'includes/database.php';
    include 'includes/loginServer.php';

    session_start();
    // instantiating LoginServer class to access its functions/methods
    $data = new LoginServer();
    $dbase = new Database();

    // variable to store message
    $message = "";
    // check if login was clicked
    if(isset($_POST["login"])){
       

        $p1 = mysqli_real_escape_string($dbase->connect(),$_POST["Username"]);
        $p2 = mysqli_real_escape_string($dbase->connect(),$_POST["Password"]);
        $q = "select * from user where username = '$p1' and password = MD5('$p2')";

        $id = 0;
        $uzer = 0;
        $count = 0;
        $rez = mysqli_query($dbase->connect(),$q);
        if($col = mysqli_fetch_array($rez)){
            $id = $col[3];
            $uzer = $col[0];
            $count =1;
        }


        if($count==1){
            
                $_SESSION["Username"] = $_POST["Username"];
                $_SESSION['uid'] = $uzer;
            
                if($id == 1){
                    header("location: admin/examples/dashboard.php");
                }
                else{
                    header("location: dashboard.php");
                    addHistory($uzer,1);
                }
          
        }else{
            // if input fields are blank, execute else statement: if both input fields are blank
            $message = "Account not found";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./loginStyles.css" />
    <title>Login</title>
</head>
<body>
    <div class="login__container">
        <h1 style="color: white;opacity: 100; user-select: none;">User Login</h1>
        <?php
            // display error message
            if(isset($message)){
                echo '<label style="color:yellow;">' . $message . '</label>';
            }
        ?>
        <form action="" method="post">
            <input type="text" name="Username" placeholder="Username">
            <input type="password" name="Password" placeholder="Password">
            <button type="submit" style="opacity: 100;" name="login">Login</button>
        </form>
    </div>   
</body>
</html>

<style type="text/css">
    body{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: url('images/bc.jpg');
    background-size: cover;
}

.login__container{
    border-radius: 5px;
    width: 100%;
    max-width: 500px;
    padding: 20px;
    height: 350px;
    background: rgba(0, 0, 0, .6);
    border-radius: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 2px 0 rgba(0, 0, 0, 0.1);
}

input[type=text], input[type=password]{
    background-color: white;
}
</style>