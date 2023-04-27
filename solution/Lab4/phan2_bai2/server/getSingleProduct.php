<?php
    include 'connect.php';
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $id= $_GET['edit_id'];
        $sql = "select * from products 
                 where products.id = $id";
        $res = mysqli_query($con, $sql);
        if($res){
        $row=mysqli_fetch_assoc($res);
            $product= array(
                'id'=> $row['id'],
                'name'=> $row['name'],
                'description'=> $row['description'],
                'price'=> $row['price'],
                'image'=> $row['image'],
            );
        
        header('Conten-Type: application/json');
        echo json_encode($product);
        }
    }
?>