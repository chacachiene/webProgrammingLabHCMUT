<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="popu" >
        <h1 id="h1">Welcome to the program</h1>
        <form action="" autoComplete='off' method="post">
            <div class="row form-group">
                <div class="col-6">
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                    <span for="mail" class="form-label">First Name</span>
                </div>
                <div class="col-6" >
                    <input id="lastName" type="text" class="form-control" name="lastName" required>
                    <span for="lastName" class="form-label">Last Name</span>
                </div>
            </div>
            <div class="form-group">
                <input id="mail" type="text" class="form-control" name="mail" required>
                <span for="mail" class="form-label">Email</span>
            </div>
            <div  class="form-group">
                <input id="password" type="password" class="form-control" name="password" required>
                <span class="form-label">Password</span>
            </div>
            <div id="Birthday" class="form-group date-picker">
                <!-- <input type="datetime" class="form-control" required> -->
                <!-- <span for="mail" class="form-label">Birthday</span> -->
                <label for="">Birthday:</label>
                <select name="day" class="date-picker__day" id="">
                    <option value="" disabled selected>Day</option>
                </select>
                
                <select name="month" class="date-picker__month" id="">
                    <option value="" disabled selected>Month</option>
                </select>
                
                <select name="year" class="date-picker__year" id="">
                    <option value="" disabled selected>Year</option>
                </select>
            </div>
            <div id="gender" class="form-group">
                <label class="gender-label">Gender:</label>
                    <div class="gender-options">
                        <div class="gender-option">
                        <input type="radio" name="gender" value="male" id="male">
                        <label for="male">Male</label>
                        </div>
                        <div class="gender-option">
                        <input type="radio" name="gender" value="female" id="female">
                        <label for="female">Female</label>
                        </div>
                        <div class="gender-option">
                        <input type="radio" name="gender" value="other" id="other">
                        <label for="other">Other</label>
                        </div>
                    </div>
            </div>
            <div id="country" class="form-group sample">
                <label for="custom-select-input">Country:</label>
                <div id="custom-select-status" class="hidden-visually" aria-live="polite"></div>
                    <div class="custom-select" id="myCustomSelect">
                        <input type="text" id="custom-select-input" class="select-css" name="coun" required>
                            
                       
                        <!-- <select name="my-select" id="my-select">
                            <option value="">Vietnam</option>
                            <option value="">Australia</option>
                            <option value="">UnitedState</option>
                            <option value="">India</option>
                            <option value="">Other</option>
                        </select> -->
                        <ul class="custom-select-options hidden-all" id="custom-select-list">
                            <li><strong>Vietnam</strong></li>
                            <li><strong>Australia</strong></li>
                            <li><strong>UnitedState</strong></li>
                            <li><strong>India</strong></li>
                            <li><strong>Other</strong></li>
                        </ul>
                    </div> 
            </div>
            <div  class="form-group">
                <label for="fname">About you: </label>
                <textarea id="About" name="about" id="" cols="30" rows="5" class="form-control" name="about" required></textarea>
               
            </div>
            <div id="submit">
                <button type="submit" name="sub" id="subBut" class="btn btn-primary" mt-3 mb-5>Submit <i class="fa fa-paper-plane"></i></button>
                <button type="reset" id="clear" class="btn btn-danger" onClick={clearForm}>Clear <i class="fa-solid fa-trash"></i></button>
            </div>
        </form>
        <div class="footer">made by Nguyen Phat</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="script.js" tyle="text/javascript"></script>
</body>
</html>
<?php //valid the infor
        if(isset($_POST['sub'])){
            //echo "submit click";
            $firstName=$_POST['firstName'];
            $lastName=$_POST['lastName'];
            $mail=$_POST['mail'];
            $about=$_POST['about'];
            $password=$_POST['password'];
            //  $country=$_POST["coun"];
            //  $about = $_POST['about'];
            
             $regName='/^[a-zA-Z]+$/';
             $regMail='/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            if(!preg_match($regName,$firstName)){
                $message = "{$firstName} is not valid!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            } 

            if(!preg_match($regName,$lastName)){
                $message = ($lastName)." is not valid!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            } 
            if(!preg_match($regMail,$mail)){
                $message = ($mail)." is not valid!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            } 
            if(strlen($password) < 2 || strlen($password)>30){
                echo "<script type='text/javascript'>alert('Password\\'s invalid');</script>";
                exit();
            }

           
             if(!isset($_POST['day'])){
                echo "<script type='text/javascript'>alert('Choose day of birth');</script>";
                exit();
             }
             if(!isset($_POST['month'])){
                echo "<script type='text/javascript'>alert('Choose month of birth');</script>";
                exit();
             }
             if(!isset($_POST['year'])){
                echo "<script type='text/javascript'>alert('Choose year of birth');</script>";
                exit();
             }
             if(!isset($_POST['gender']) || empty($_POST['gender'])){
                echo "<script type='text/javascript'>alert('Choose your gender');</script>";
                exit();
            }
            $gender = $_POST['gender'];
             if(!isset($_POST['coun'])){
                echo "<script type='text/javascript'>alert('Choose your conntry');</script>";
                exit();
             }
             if(!isset($_POST['about'])){
                echo "<script type='text/javascript'>alert('Tell me about u');</script>";
                exit();
             }
            echo "<script tyoe='text/javascript'>alert('Success');</script>";
        }

    ?>