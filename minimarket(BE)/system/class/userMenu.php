<?php

// require 'database.php';

class userMenu extends Database {
    function userRegist($data){
        $username = strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($this->conn, $data['password']);
        $password2 = mysqli_real_escape_string($this->conn, $data['password2']);
        $email = strtolower(stripslashes($data['email']));
    
        $result = mysqli_query($this->conn, "SELECT `username` FROM `users` WHERE `username` = '$username'");
    
        if(mysqli_fetch_assoc($result)){
            echo "
                <script>
                    alert('Username already exist');
                </script>
            ";
            return false;
        }
        
        if ($password !== $password2) {
            echo "<script>
                alert('Confirmation password is invalid!');
            </script>";
            return false;
        }
    
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($this->conn, "INSERT INTO users VALUES (NULL, '$username', '$password', '$email')");
    
        return mysqli_affected_rows($this->conn);
    }
    
    function checkUserLogin($url){
        if(!isset($_SESSION["user-login"])){
            header("Location: $url");
            exit;
        } 
    }

    function userLogin($data){
    
        $username = strtolower($data["username"]);
        $password = $data["password"];
    
    
        $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username'");
    
        if(!$result) {
            return false;
        }
    
        $row = mysqli_fetch_assoc($result);
    
        if(mysqli_num_rows($result) === 1){
            if(password_verify($password, $row["password"])){
                $_SESSION["user-login"] = true;
                $_SESSION["username"] = $username;
                if(isset($data["remember"])){
                    setcookie("key", hash("sha256", $username), time() + 60 * 60 * 24, "/");
                    setcookie("id", $row["id"], time() + 60 * 60 * 24, "/");
                    setcookie("username", $username, time() + 60 * 60 * 24, "/");
                }
            }
            
            checkCookie();
            return true;
        } else {
            return false;
        }
    }
}

$userMenu = new userMenu();