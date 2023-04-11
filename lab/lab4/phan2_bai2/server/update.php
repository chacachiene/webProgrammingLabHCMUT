<?php
    include 'connect.php';
    
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $data = file_get_contents("php://input");
        $product = json_decode($data);
        $sql = "UPDATE PRODUCTS SET name = '{$product->name}', description = '{$product->description}', price = '{$product->price}', image = '{$product->image}' WHERE id ='{$product->id}'";
        $res = mysqli_query($con, $sql);
        if($res){
            http_response_code(200);
            echo json_encode(['id'=> $product->id,
             'name'=> $product->name,
              'description'=> $product->description,
               'price'=> $product->price,
                'image'=>$product->image]);
        }
        else{
            http_response_code(500);
            echo json_encode(['message'=> 'Failed to update product']);
        }
    }

?>