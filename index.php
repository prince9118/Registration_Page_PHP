<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> php Registraion Page</title>
</head>
<body>
<?php
$nameErr="";
$emailErr="";
$genderErr="";
$name="";
$email="";
$gender="";
if($_SERVER['REQUEST_METHOD']=="POST"){
     if(empty($_POST["name"])){
        $nameErr = "Name Field is required";
    }
    else{
        $name=test_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z ]*$/", $name)){
            $nameErr="Only Alphabets are allowed";
        }

    }

    if(empty($_POST["email"])){
        $emailErr="Email Field is required";

    }
    else{
        $email=test_input($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr="INVALID EMAIL FORMATTING";

        }
    }
    if(empty($_POST['gender'])){
        $genderErr="gender field is required";

    }
    else{
        $gender=test_input($_POST["gender"]);
    }
    function test_input($data){
        $data=trim($data);
        $data = stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
}
?>
<h1>PHP Registraion Page</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <b>Enter Name:</b><input type="text" name="name" value="<php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br><br>
        <b>enter email-id:</b><input type="text" name="email" value="<?php echo $amil;?>">
        <span class="error"> * <?php echo $emailErr;?></span>
        <br><br><br>
        <b>Enter Your Gender:</b>
              <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> 
              value="female">Female
             <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
             <span class="error">* <?php echo $genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="register">
        
        </form>
        <?php
       
            echo "<h2>Your Input</h2>";
            echo $name;
            echo "<br>";
            echo $email;
            echo "<br>";
            echo $gender;
        
        
        ?>
        
        
    
</body>
</html>