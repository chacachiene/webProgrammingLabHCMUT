<!-- add a new product into table -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>phan2 bai 3</title>
  </head>
<body>
<div style="display: flexbox; width: 100%; margin: 10px;">
        <form id="add-product" action="" method="post">
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Price</label>
                <input type="number" class="form-control" id="price" name="price" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Image</label>
                <input type="text" class="form-control" id="image" name="img" />
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>    
          <?php
            // if(isset($_POST['submit'])){
            //   $name = $_POST['name'];
            //   $price = $_POST['price'];
            //   $description = $_POST['description'];
            //   $img = $_POST['img'];
            //   include 'check.php';
            //   $sql = "INSERT INTO PRODUCTS (name, price, description, image) VALUES ('$name', $price, '$description', '$img')";
            //   $res = mysqli_query($con, $sql);
            //     if($res){
            //       echo "<script type='text/javascript'>alert('Success');</script>";
            //       echo "<script type='text/javascript'>window.location.href = 'a.php';</script>";
            //       exit;
            //     } else{
            //         echo "Error: " . $sql . "<br>" . mysqli_error($con);
            //     }
            // }
          ?>
      </div>
      <script>
        $(document).ready(function(){
          $("#add-product").submit(function(event){
            event.preventDefault();
            var product = {
              name: $("#name").val(),
              price: $("#price").val(),
              description: $("#description").val(),
              image: $("#image").val()
            };
            $.ajax({
              url: "server/add.php",
              type: "POST",
              data: JSON.stringify(product),
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              success: function(data){
                alert("Success");
                console.log(data);
                window.location.href = "a.php";
              },
              error: function( errorThrown){
                console.log(errorThrown);
                alert("Error: "+ errorThrown);
              }
            })
          })
        })
      </script>
</body>
</html>