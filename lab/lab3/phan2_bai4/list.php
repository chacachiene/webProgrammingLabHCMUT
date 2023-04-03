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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    include './partials/connect.php';
    include './partials/header.php';
    ?>
    <!-- this is main -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="cate">
                    <div class="catehead">Category</div>
                    <div class="catelist">
                        <a href="">Item 1</a><br>
                        <a href="">Item 2</a><br>
                        <a href="">Item 3</a><br>
                        <a href="">Item 4</a><br>
                        <a href="">Item 5</a><br>
                    </div>
                </div>
                <div class="topProduct">
                    <div class="tophead">Top Products</div>
                    <div class="prolist">
                        <a href="">Item 1</a><br>
                        <a href="">Item 2</a><br>
                        <a href="">Item 3</a><br>
                        <a href="">Item 4</a><br>
                        <a href="">Item 5</a><br>
                    </div>
                </div>
                <div></div>
            </div> 
            <div class="col-sm-6">
                <div class="head">Top Products</div>
                    <div class= "row">
                    <?php
                        $sql = "SELECT * FROM PRODUCTS join IMG on products.id= img.id";
                        $res = mysqli_query($con,$sql);
                        if($res){
                            while($row = mysqli_fetch_assoc($res)){
                                $proId = $row['id'];
                                $proName = $row['name'];
                                $proDes = $row['desciption'];
                                $proPrice= $row['price'];
                                $img = $row['img1'];
                                echo '
                            
                                <div class="pro col-md-4 col-sm-6 col-xm-12 mb-3">
                                        <div class="card">
                                            <img src='.$img.' alt="" id= '.$proId.'>
                                            <p class="pro-title">'.$proName.' </p>
                                            <p class="price"> $'.$proPrice.'</p>
                                            <div class="but">
                                            <button class="custom-btn btn-6"><span><a href="detail.php?detail_id='.$proId.' " class="but">Buy Now</a></span></button>
                                            </div>
                                        </div>
                                </div>
                                ';
                    // jquery to go to detail page.
                                echo '
                                    <script>
                                    $(document).ready(function(){
                                        $("#'.$proId.'").click(function(){
                                            window.location.href = "detail.php?detail_id='.$proId.'";
                                        });
                                    });
                                    </script>
                                ';
                            }
                        }
                    ?>
                    </div>
            </div>
        </div>
    </div>
    <!-- end main -->
    <?php
    include './partials/footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="jquery.js" type="text/javascript"></script>
</body>
</html>