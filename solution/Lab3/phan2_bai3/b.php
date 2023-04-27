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
    <title>phan2 bai 3</title>
  </head>
<body>
    <?php
      include 'connect.php';
    ?>
<div style="display: flexbox; width: 100%; margin: 10px;">
        <form action="" method="post">
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Product Name</label>
                <input type="text" class="form-control" id="ftitle" name="name" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Price</label>
                <input type="number" class="form-control" id="fprice" name="price" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Description</label>
                <textarea class="form-control" id="fdescription" name="description" rows="10"></textarea>
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Image</label>
                <input type="text" class="form-control" id="fimage" name="img" />
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>    
          <?php
            if(isset($_POST['submit'])){
              $name = $_POST['name'];
              $price = $_POST['price'];
              $description = $_POST['description'];
              $img = $_POST['img'];
              include 'check.php';
              $sql = "INSERT INTO PRODUCTS (name, price, description, image) VALUES ('$name', $price, '$description', '$img')";
              $res = mysqli_query($con, $sql);
                if($res){
                  echo "<script type='text/javascript'>alert('Success');</script>";
                  echo "<script type='text/javascript'>window.location.href = 'a.php';</script>";
                  exit;
                } else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                }
            }
          ?>
      </div>
</body>
</html>
<?php
    mysqli_close($con);
?>