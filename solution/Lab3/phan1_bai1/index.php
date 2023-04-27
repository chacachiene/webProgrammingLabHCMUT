<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to the program</h1>
    <p>Give me two numbers</p>
    <form action="" method='post'>
    <input type="number" name="num1">
    <input type="number" name="num2">
    <input type="submit" name="submit">
    <br>
    </form>
<?php 
        $num1=0;
        $num2=0;
        if(isset($_POST['submit']) ){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            cal($num1,$num2);
        }
        
        
    ?>
<?php
function cal($x, $y){
    echo "$x"." + "."$y"." = ". ($x +$y)."<br>";
    echo "$x"." - "."$y"." = ". ($x -$y)."<br>";
    echo "$x"." * "."$y"." = ". ($x *$y)."<br>";
    echo "$x"." / "."$y"." = ". ($x /$y)."<br>";
    echo "$x"." % "."$y"." = ". ($x %$y)."<br>";
    }
?>
    
</body>
</html>


