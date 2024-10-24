<?php
 require '../../system/functions.php';
 session_start();
 $adminMenu->checkAdminLogin("../index.php");


$id = $_GET['id'];

if($productMenu->deleteProduct($id) > 0){
    echo "
    <script>
        alert('Product has successfully deleted!');
        document.location.href = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data has failed to be deteled!');
        document.location.href = '../index.php';
    </script>
    ";
}

?>