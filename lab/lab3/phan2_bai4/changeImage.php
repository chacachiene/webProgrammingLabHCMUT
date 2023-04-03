<?php
    if(isset($_GET['id'])){
        $image = $_GET['id'];
        include './partials/connect.php';
        $sql = "select img2 from img where id = $image";
        $res = mysqli_query($con, $sql);
        if($res){
            $row = mysqli_fetch_assoc($res);
            $img = $row['img2'];
            $res=array('image'=>$img);
            header('Content-Type: application/json');
            echo json_encode($res);
        }
    }
?>  