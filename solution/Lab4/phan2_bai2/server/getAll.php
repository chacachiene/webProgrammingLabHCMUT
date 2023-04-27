<?php
    include 'connect.php';
    $sql = 'SELECT * FROM PRODUCTS';
    $res = mysqli_query($con, $sql );
    $products = array();
    while($row=mysqli_fetch_assoc($res)){
        $product= array(
            'id'=> $row['id'],
            'name'=> $row['name'],
            'description'=> $row['description'],
            'price'=> $row['price'],
        );
        array_push($products, $product); #be careful
    }
    header('Conten-Type: application/json');
    echo json_encode($products);
?>