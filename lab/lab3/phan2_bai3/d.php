<?php
    //this uses to delete a product in database
    include 'connect.php';
    $id= $_GET['delete_id'];
    $sql = "DELETE FROM PRODUCTS WHERE id=$id";
    $res = mysqli_query($con, $sql);
    if($res){
        echo "<script type='text/javascript'>alert('Success');</script>";
        echo "<script type='text/javascript'>window.location.href = 'a.php';</script>";
    //header('Location: a.php');
        exit;
    } else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
?>
<?php
    mysqli_close($con);
?>