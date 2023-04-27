<?php
        
            if(!is_string($name)||strlen($name)<5 || strlen($name)>40){
                echo "Invalid name. It should be a string with length from 5 to 40 character";
                exit;
            }
            if(!is_string($description)||strlen($description)<5 || strlen($description)>5000){
                echo "Invalid description. It should be a string from 5 to to 5000 character";
                exit;
            }
            if(!is_numeric($price)){
                echo "Invalid price. It should be a numeric value.";
                exit;
            }
            if(!is_string($img)|| strlen($img)>255){
                echo "Invalid image. It should be a string with length up to 255 character.";
                exit;
            }
                
        
      ?>