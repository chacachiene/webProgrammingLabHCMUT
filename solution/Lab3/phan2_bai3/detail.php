<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="path/to/icon/font.css"/>
</head>
<body>
    <?php
        include 'connect.php';
        
    ?>
    <?php
        $id= $_GET['detail_id'];
        $sql = "select * from products
                where products.id = $id";
         $res = mysqli_query($con, $sql);
         if($res){
            $row = mysqli_fetch_assoc($res);
            $proName = $row['name'];
            $proDes = $row['description'];
            $proPrice= $row['price'];
            $img = $row['image'];
            echo '
            <div class="linkpro"> <a href="a.php" class="">Home </a>   <span> > </span> <a href=""> '.$proName.'</a>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <img src='.$img.' alt="">
                </div>
                <div class="col-sm-6">
                    <h5>'.$proName.'</h5>
                    <h6>Summary</h6>
                    <p>'.$proDes.'</p>
                    <p class="detail_price">$'.$proPrice.'
                    </p>
                </div>
            </div>
            ';
        }
        
    ?>
</body>
</html>
<?php
    mysqli_close($con);
?>