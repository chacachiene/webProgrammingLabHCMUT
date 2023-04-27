<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-l7dDjFEZuim7nAXn5k5V7I5TH6JwV6Ue/X6UtuQ6+8kZbFA9Nbh+1SjJWQOs8G/4wC7HOf4e4pW4f8e+41pR9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/8a64d0dbb9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<h1 id="h1">Nguyen Phat's Calculator</h1>
<form action="" method="post">
    <input type="number" name="num1">
    <select name="ope" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="x">x</option>
        <option value="/">/</option>
        <option value="1/x">1/x</option>
    </select>
    <input type="number" name="num2">
    <input type="submit" value="=" name='submit'>
</form>
    <?php
        if(isset($_POST['submit'])){
            $x = $_POST['num1'];
            $o = $_POST['ope'];
            $y = $_POST['num2'];
            if($x==""||$y==""){
                die("please enter number into those box");
            }
            switch ($o) {
                case '+':
                    echo "$x"." + "."$y"." = ".($x+$y);
                    break;
                case '-':
                    echo "$x"." - "."$y"." = ".($x-$y);
                    break;
                case 'x':
                    echo "$x"." x "."$y"." = ".($x*$y);
                    break;
                case '/':
                    echo "$x"." / "."$y"." = ".($x/$y);
                    break;
                case '1/x':
                    echo "$y"." / "."$x"." = ".($y/$x);
                    break;
                
                default:
                    echo "something wrong here!";
                    break;
            }
        }


    ?>
</body>
</html>

<?php


?>


