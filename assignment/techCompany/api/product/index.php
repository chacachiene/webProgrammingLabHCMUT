<?php
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Origin: *");
    include '../connect.php';
    $db = new DBconnect;
    $con = $db->connect();
    //print_r($con);
    //print_r(file_get_contents('php://input'));
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case 'GET':
            $sql = "SELECT * FROM PRODUCT";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
        case 'POST':
            $product = json_decode(file_get_contents('php://input'));
            $sql="INSERT INTO PRODUCT(Name, price, description, amount) VALUES (?,?,?,?)";
            $stmt = $con->prepare($sql);
            $DateCreate = date('Y-m-d');
            $type = "no";
           
           
            if( $stmt->execute([$product->name, $product->price, $product->description,$product->amount])){
                $res = ['status'=> 200, 'message'=>
                'Product created successfully'];
            } else{
                $res = ['status'=> 400, 'message'=>
                'Product created failed'];
            }
            $error_info = $stmt->errorInfo();
            if ($error_info[0] != '00000') {
                echo 'PDO Error: ' . $error_info[2];
            }
            echo json_encode($res);
            
            break;
        case 'PUT':
            echo "PUT";
            break;
        case 'DELETE':
            echo "DELETE";
            break;
        default:
            echo "Method not allowed";
            break;
    }
?>