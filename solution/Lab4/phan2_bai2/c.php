<!-- adjust a record -->
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
        <form id="update-product" method="post">
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Product Name</label>
                <input type="text" class="form-control" id="ftitle" name="name" value= "" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="ftitle">Price</label>
                <input type="number" class="form-control" id="price" name="price" value= "" />
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10" ></textarea>
              </div>
            </div>
            <div class="form-row" style="margin-bottom: 10px;">
              <div class="form-group col-md-12">
                <label for="fdescription">Image</label>
                <input type="text" class="form-control" id="img" name="img" value= "" />
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>    
      </div>
      <script>
        $(document).ready(function(){
          var productId = <?php echo $_GET['edit_id'] ?>;
          console.log(productId);
          $.ajax({
            url: "server/getSingleProduct.php?edit_id=" + productId,
            type:"GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data){
              console.log(data);
              $("#ftitle").val(data.name);
              $("#description").val(data.description);
              $("#price").val(data.price);
              $("#img").val(data.image);
            },
            error: function(err){
              console.log(err);
            }
          });
          $("#update-product").submit(function(e){
            e.preventDefault();
            var product = {
              id: productId,
              name: $("#ftitle").val(),
              description: $("#description").val(),
              price: $("#price").val(),
              image: $("#img").val()
            }
            $.ajax({
              url: "server/update.php?edit_id=" + productId,
              type:"POST",
              contentType: "application/json; charset=utf-8",
              dataType: "json",
              data: JSON.stringify(product),
              success: function(data){
                console.log(data);
                alert("Update successfully");
                window.location.href = "a.php";
              },
              error: function(err){
                console.log(err);
              }
            })
          })
        })
      </script>
     
</body>
</html>