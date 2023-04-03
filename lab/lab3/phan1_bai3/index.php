<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to while/for progam</h1>
    <p>Now, I will show u how to use while and for loop in php</p>
    <p>What do u want to use?</p>
    <form action="" method="post">
        <input type="submit" name="but1" value="for">
        <input type="submit" name="but2" value="while">
    </form>
    <br>

</body>
    
<?php
    if(isset($_POST['but1']) ){
        
        forUsed();
    } else if(isset($_POST['but2'])){
        whileUsed();
    }

    function forUsed(){
        echo "This is code of using for:". "<br>";
        echo 'for($x=0;$x<101;$x++){'.'<br>'.
            'if($x&1){'.'<br>'.
                'echo $x;'.'<br>'.
                'echo " ";}'.'<br>'.
            
        '}';
        echo '<br>'.'and the result is: '.'<br>';
        for($x=0;$x<101;$x++){
            if($x&1){
                echo $x;
                echo " ";
            }
        }
    }
    function whileUsed(){
        echo "This is code of using for:". "<br>";
        echo '$i=0;'.'<br>'.
            'while($i<100){'.'<br>'.
            'if($x&1){'.'<br>'.
                'echo $x;'.'<br>'.
                'echo " ";}'.'<br>'.
            
        '}';
        echo '<br>'.'and the result is: '.'<br>';
        $i=0;
        while($i<100){
            if($i&1){
                echo $i;
                echo " ";
            }
            $i++;
        }
    }
    echo "<br>";
?>