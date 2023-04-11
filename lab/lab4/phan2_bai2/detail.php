<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <script>
        $(document).ready(function(){
          var productId = '<?php echo $_GET['detail_id'] ?>';
          console.log(productId);
          $.ajax({
            url: "server/getSingleProduct.php?edit_id=" + productId,
            type:"GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data){
              console.log(data);
              $("#link").text(data.name);
              $("#ftitle").text(data.name);
              $("#description").text(data.description);
              $("#price").text(data.price);
            //   $("#img").val(data.image);
              $("#img").attr("src",data.image);
            },
            error: function(err){
              console.log(err);
            }
          });
        });
    </script>
    <div class="linkpro"> <a href="a.php" class="">Home </a>   <span> > </span> <a href="" id="link"> </a>
     </div>
     <div class="row">
         <div class="col-sm-6">
             <img id="img" alt="">
         </div>
         <div class="col-sm-6">
             <h5 id="ftitle"></h5>
             <h6>Summary</h6>
             <p id= "description"></p>
             <p class="detail_price" id="price"></p>
         </div>
     </div>
</body>
</html>