<?php
include 'db.php';
class Database{
    
 
    private $servername;
    private $username;
    private $password;
    private $dbname;

 
    public function connect(){
        $this->servername = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'newpoultry';
 
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }

    
}


function stripString($string){
    $db10 = new Database();
    return mysqli_real_escape_string($db10->connect(),$string);
}

function defaultDate(){
    $dbbbbbb = new Database();
    $res = mysqli_query($dbbbbbb->connect(),"SELECT NOW()");
    $ret = "";
    if($colx = mysqli_fetch_array($res)){
        $ret = $colx[0];
    }
    return $ret;
}
function mysqlDate(){
    $dbbbbbb = new Database();
    $res = mysqli_query($dbbbbbb->connect(),"SELECT DATE_FORMAT(NOW(),'%Y-%m-%d')");
    $ret = "";
    if($colx = mysqli_fetch_array($res)){
        $ret = $colx[0];
    }
    return $ret;
}

function addHistory($user, $stat){
    $db1 = new Database();
    $sql = "insert into log_history values(null,'$user','$stat',now())";
    mysqli_query($db1->connect(),$sql);
}




   



?>