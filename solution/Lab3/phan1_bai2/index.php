<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_POST['submit'])){ ?>
            <p>Type a number into box: </p>
            <form action="" method="post">
            <input type="number" name="number">
            <input type="submit" name="submit">
            </form>
    <?php
        } else {
            $y=$_POST['number'];
            message($y);
            
            
        }
    ?>
    <?php
    function message(int $x){
        
        switch ($x%5){
            case 0: 
                echo "Hello";
                break;
            case 1: 
                echo "How are you?";
                break;
            case 2: 
                echo "I'm doing well, thank you";
                break;
            case 3: 
                echo "See you later";
                break;
            case 4: 
                echo "Good-bye";
                break;
        }
    }
?>
</body>
</html>
