<!-- list of all product in database -->
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
    <link rel="stylesheet" href="css/style.css" />
    <title>phan2 bai 3</title>
  </head>
  <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-info" style="margin-bottom: 10px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">List Product</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


  <script>
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'server/getAll.php', true);
  xhr.onload = function(){
    if(xhr.status === 200){
      var products =JSON.parse(xhr.responseText);
      var table =document.getElementById("ptable");
      products.forEach(element => {
      var row = table.insertRow();
      row.insertCell().innerHTML=element.id;
      row.insertCell().innerHTML=element.name;
      row.insertCell().innerHTML=element.description;
      row.insertCell().innerHTML=element.price;
      row.insertCell().innerHTML='<a href="detail.php?detail_id='+element.id+'"><button type="button" class="btn btn-primary">Detail</button></a> '+
                                  '<a href="c.php?edit_id='+element.id+'"><button type="button" class="btn btn-warning">Edit</button></a>' +
                                '<a href="d.php?delete_id='+element.id+'"><button type="button" class="btn btn-danger" onclick="return confirm(\'Are you sure ?\')">Delete</button></a>';
      });
    }
  }
  xhr.send();
</script>
    <div class="container">
      <!-- Button -->
      <a href="b.php"><button type="button" class="btn btn-primary">Creare New Product</button></a>
      <!-- Table with Button -->
      <table class="table" id="ptable">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

<?php
    // include 'connect.php';
    // $sql = 'SELECT * FROM PRODUCTS';
    // $res = mysqli_query($con, $sql );
    // if($res){
    //     while($row = mysqli_fetch_assoc($res)){
    //         $proId = $row['id'];
    //         $proName = $row['name'];
    //         $proDes = $row['description'];
    //         $proPrice= $row['price'];
    //         echo '
    //         <tr>
    //         <th scope="row">'.$proId.'</th>
    //         <td>'.$proName.'</td>
    //         <td>'.$proDes.'</td>
    //         <td>'.$proPrice.'</td>
    //         <td>
    //           <a href="detail.php?detail_id='.$proId.'"><button type="button" class="btn btn-primary fun">Read</button></a>
    //           <a href="c.php?edit_id='.$proId.'"><button type="button" class="btn btn-warning fun">Edit</button></a>
               
    //           <a href="d.php?delete_id='.$proId.'"><button type="button" class="btn btn-danger fun" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button></a>
    //         </td>
    //       </tr>
    //         ';
            
    //     }
    //     echo '<script type="text/javascript>
    //         if( confirm("Are you sure you want to delete this product?")){
    //             window.setTimeout(function(){
    //                 window.location.href="d.php?delete_id='.$proId.'";), 1000);
    //         }
    //         </script>';
    // }
?>
        </tbody>
      </table>
    </div>
  </body>
</html>
 <!-- <a href="d.php?delete_id='.$proId.'"><button type="button" class="btn btn-danger">Delete</button></a> -->
 <