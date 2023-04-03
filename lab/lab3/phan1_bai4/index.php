<?php
    $data_cells = array();
    for($i=1;$i<8;$i++){
        $data_cell=array();
        for($j=1;$j<8;$j++){
            $data_cell[$j]=$i*$j;
           // echo $j*$i." ";
        }
       // echo "<br>";
        $data_cells[$i]=$data_cell;
    }
    // for($i=1;$i<8;$i++){
    //     for($j=1;$j<8;$j++){
    //         echo $data_cells[$i][$j];
    //      //   echo "  ";
    //     }
    // } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <table border="1">  
        <?php foreach ($data_cells as $data_cell):  ?>
        <tr>
            <?php for($i = 1; $i < 8;$i++): ?>
                <td>
                    <?php echo $data_cell[$i] ; ?>
                </td>
                
            <?php endfor; ?>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>