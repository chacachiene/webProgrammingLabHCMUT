<?php

    include 'connect.php';
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $id= $_GET['delete_id'];
        $sql = "delete from products 
                 where products.id = $id";
        $res = mysqli_query($con, $sql);
        if($res){
            http_response_code(200);
            echo json_encode(['message'=> 'Delete product successfully']);
        }
        else{
            http_response_code(500);
            echo json_encode(['message'=> 'Failed to delete product']);
        }
    }


?>