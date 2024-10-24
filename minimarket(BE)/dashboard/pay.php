<?php

require '../system/functions.php';

if(isset($_GET['id'])){
    if($productMenu->payProduct($_GET) > 0){
        echo "
            <script>
             alert('Payment confirmed!');
            </script>
        ";
        header('location: orders.php');
        exit;
        echo "bener";
    }
} else {
    header('location: orders.php');
    exit;
}

?>