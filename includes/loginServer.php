<?php


    include_once 'database.php';
    include 'action.php';
 
    class LoginServer extends Database{

        public $error;

        // method to validate login information

        // $field parameter is associative array where key is equal to field and value is HTML field name
        public function loginValidation($field){
            $count = 0; 
            foreach($field as $key => $value){
                if(empty($value)){ // Value is HTML field. 
                    $count++; // increase count value for displaying error
                    $this->error= "<p>" . $key . " is required!</p>";
                }
            }
            // check if count value is 0 then it will return true, otherwise produce error
            if($count == 0){
                return true;
            }else{

            }
        }

        // method to check if right login information was entered
        public function canLogin($table, $where){
            $condition = '';
            foreach($where as $key => $value){
                $condition .= $key . " = '" . $value ."' AND ";
            }
            $condition = substr($condition, 0, -5);
            /* This code will convert array to string like this:
            input - array(
                'id' => '5'
            )
            output = id = '5'
            */

            // query
            $sql = "SELECT * FROM " . $table . " WHERE " . $condition;
            
            // if number of rows is greater than 0, the user entered the right info. else, wrong data
            if(hasResults($sql)==1){
                return true;
            }else{
                $this->error = "<p style='opacity: 100;font-weight:900;color:yellow;'>Account not found.!</p>";
            }
        }
    }

?>