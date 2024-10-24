<?php


function checkCookie(){
    global $database;

    if(!isset($_COOKIE['id']) || !isset($_COOKIE['key'])){
        return false;
    }
    $id = $_COOKIE['id'];

    $result = mysqli_query($database->conn, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    
    if ($_COOKIE['key'] === hash("sha256", $row["username"])){
        $_SESSION["user-login"] = true;
        $_SERVER['username'] = $_COOKIE['username'];
    }  else {
        unset($_SESSION["user-login"]);
        header("Location: ../index.php");
    }
}

function upload() {
    
    $fileName = $_FILES['prd-thumb']['name'];
    $fileSize = $_FILES['prd-thumb']['size'];
    $error = $_FILES['prd-thumb']['error'];
    $tmpName = $_FILES['prd-thumb']['tmp_name'];
    
    if( $error === 4 ){
        echo "<script>
            alert('Choose a file first!');
            </script>";
    }
    $validExtension = ['jpg', 'jpeg', 'png'];
    $fileExtension = strtolower(end(explode(".", $fileName)));
    if(!in_array($fileExtension, $validExtension)){
        echo "<script>
        alert('Choosen file is not a picture!');
        </script>";
        return false;
    }
    if($fileSize > 1000000){
        echo "<script>
        alert('Choosen file is too big!');
        </script>";
        return false;
    }
    $newFileName = uniqid() . "." . $fileExtension;
    move_uploaded_file($tmpName, '../../img/' . $newFileName);
    return $newFileName;
}

require 'class/adminMenu.php';
require 'class/productsMenu.php';
// require 'class/database.php';
require 'class/userMenu.php';