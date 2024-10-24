<?php
// require 'database.php';
class productMenu extends Database {
    function searchProducts($keyword) {
    
        $query = "SELECT * FROM `products` WHERE `prd-nama` LIKE '%$keyword%'
                    OR `prd-kategori` LIKE '%$keyword%'";
            
        return $this->query($query);
    }

    function deleteProduct($id){
        $query = "DELETE FROM products WHERE `products`.`id` = $id";
        mysqli_query($this->conn, $query);
        return mysqli_affected_rows($this->conn);
    }


    
    function addProduct($data){
        $prdName = htmlspecialchars($data['prd-nama']);
        $prdPrice = htmlspecialchars($data['prd-harga']);
        $prdCategory = htmlspecialchars($data['prd-kategori']);
        $prdDetails = htmlspecialchars($data['prd-details']);
    
        $thumb = upload();
        if( !$thumb ){
            return false;
        }
    
        $query = "INSERT INTO products 
            VALUES
            ('', '$prdName', $prdPrice, '$prdCategory', '$thumb', '$prdDetails')";
    
        mysqli_query($this->conn, $query);
    
        return mysqli_affected_rows($this->conn);
    }
    
    function updateProduct($data){
        $id = $data['id'];
        $prdName = htmlspecialchars($data['prd-nama']);
        $prdPrice = htmlspecialchars($data['prd-harga']);
        $prdCategory = htmlspecialchars($data['prd-kategori']);
        $prdDetails = htmlspecialchars($data['prd-details']);
        $oldThumb = htmlspecialchars($data['thumb']);
        
        if($_FILES['prd-thumb']['error'] === 4){
            $thumb = $oldThumb;
        } else {
            $thumb = upload();
        }

        $query = "UPDATE `products` SET 
                    `prd-nama` = '$prdName', 
                    `prd-harga` = '$prdPrice',
                    `prd-kategori` = '$prdCategory',
                    `prd-thumb` = '$thumb',
                    `prd-details` = '$prdDetails'
                    WHERE id = '$id'
                ";

        mysqli_query($this->conn, $query);

        return mysqli_affected_rows($this->conn);
    }

    function orderProduct($data){
        $username = $data['username'];
        $prdName = $data['prd-nama'];
        $prdPrice = $data['prd-harga'];
        $prdQty = $data['ord-qty'];
        $ordAddress = $data['ord-address'];
        $prdPrice *= $prdQty;
    
        $query = "INSERT INTO `orders` 
            VALUES
            ('', '$prdName', $prdQty, '$username', '$ordAddress', $prdPrice, 'UNPAID')";
        
        mysqli_query($this->conn, $query);
    
        return mysqli_affected_rows($this->conn);
    }

    function payProduct($data){
    
        $id = $data['id'];
    
        $query = "UPDATE `orders` SET
                    `ord-status` = 'PAID'
                    WHERE `ord-id` = $id
                ";
    
        mysqli_query($this->conn, $query);
    
        return mysqli_affected_rows($this->conn);
    }
    
}

$productMenu = new productMenu();