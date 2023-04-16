<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: *');
    // header('Access-Control-Allow-Origin: *');
    // header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    // header('Access-Control-Allow-Headers: Content-Type');
    // if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    //     header('Access-Control-Allow-Origin: *');
    //     header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    //     header('Access-Control-Allow-Headers: Content-Type');
    //     header('Access-Control-Max-Age: 86400');
    //     exit;
    // }
    
    
    include '../connect.php';
    $db = new DBconnect;
    $con = $db->connect();
    //print_r($con);
    //print_r(file_get_contents('php://input'));
    $method = $_SERVER['REQUEST_METHOD'];
    switch($method){
        case 'GET':
            $sql = "SELECT * FROM PRODUCT";
            $path = explode('/', $_SERVER['REQUEST_URI']);
            if( isset($path[4])){
                $sql = "SELECT * FROM PRODUCT WHERE id = $path[4]";
            }
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
            $product = json_decode(file_get_contents('php://input'));
            $sql="UPDATE PRODUCT SET Name = ?, price = ?, description = ?, amount = ? WHERE id = ?";
            $stmt = $con->prepare($sql);
            $DateCreate = date('Y-m-d');
            $type = "no";
            if( $stmt->execute([$product->name, $product->price, $product->description,$product->amount, $product->id])){
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
        case "DELETE":
            $path = explode('/', $_SERVER['REQUEST_URI']);
            $product = $path[4];
            $sql="DELETE FROM PRODUCT WHERE id IN ($product)";
            $stmt = $con->prepare($sql);
            if( $stmt->execute()){
                $res = ['status'=> 200, 'message'=>
                'Product deleted successfully'];
            } else{
                $res = ['status'=> 400, 'message'=>
                'Product deleted failed'];
            }
            $error_info = $stmt->errorInfo();
            if ($error_info[0] != '00000') {
                echo 'PDO Error: ' . $error_info[2];
            }
            echo json_encode($res);
            break;
        default:
            echo "Method not allowed";
            break;
    }
?>