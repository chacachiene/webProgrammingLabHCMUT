<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        include './partials/connect.php';
        include './partials/header.php';
    ?>
    <?php
        $id= $_GET['detail_id'];
        $sql = "select * from products join img on products.id = img.id
                where products.id = $id";
         $res = mysqli_query($con, $sql);
         if($res){
            $row = mysqli_fetch_assoc($res);
            $proName = $row['name'];
            $proDes = $row['desciption'];
            $proPrice= $row['price'];
            $img1 = $row['img1'];
            $img2 = $row['img2'];
            echo '
            <div class="linkpro"> <a href="list.php" class="">Home </a>   <span> > </span> <a href=""> '.$proName.'</a>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <img src='.$img1.' alt="" id="mainPic">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">
                            <img class="de" src='.$img1.' alt="">
                        </div>
                        <div class="col-3">
                            <img class="de" src='.$img2.' alt="">
                        </div>
                        <div class="col-3"></div>
                        
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5>'.$proName.'</h5>
                    <h6>Summary</h6>
                    <p>'.$proDes.'</p>
                    <p class="detail_price">$'.$proPrice.'
                    </p>
                    <div class="but">
                        <button class="custom-btn btn-6"><span>Buy Now</span></button>
                    </div>
                </div>
            </div>
            <br>
            <div class="descrip">
                <h6>Decription</h6>
               <p>'.$proDes.'</p>
            </div>
          </div>
            ';
        }
    ?>
    <?php
        include './partials/footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="jquery.js" type="text/javascript"></script>
</body>
</html>