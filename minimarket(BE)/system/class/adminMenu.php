<?php
require 'database.php';

class adminMenu extends Database {
    function adminLogin($data){
    
        $username = strtolower($data["adm-name"]);
        $password = $data["adm-pass"];
    
    
        $result = mysqli_query($this->conn, "SELECT * FROM `admins` WHERE `adm-name` = '$username' ");
    
        if(!$result) {
            return false;
        }
    
        $row = mysqli_fetch_assoc($result);
    
        if(mysqli_num_rows($result) === 1){
            if(password_verify($password, $row["adm-pass"])){
                $_SESSION["adm-login"] = true;
                return true;
            } else {
                return false;
            }
        }  else {
            return false;
        }
    }
    function checkAdminLogin($url){
        if(!isset($_SESSION["adm-login"])){
            header("Location: $url");
            exit;
        } 
    }
}

$adminMenu = new adminMenu();