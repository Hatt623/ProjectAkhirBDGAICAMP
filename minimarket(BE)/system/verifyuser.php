<?php
// connect to database
require 'functions.php';
session_start();

if($userMenu->userLogin($_POST) > 0 ){
    header("Location: ../index.php"); die();
} else {    
    header("Location: ../index.php"); die();
};

?>