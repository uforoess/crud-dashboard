<?php
session_start();
    include ("connection.php");
    include ("functions.php");

 
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if(!empty($name) && !empty($password) && !is_numeric($name) && !empty($email) && !is_numeric($email))
        {

            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id, name, password, email) values ('$user_id', '$name', '$password', '$email')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;

        }else
        {
            echo '<script>alert("Please enter some valid information!")</script>';
        }


    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <style type="text/css">

    #text{

        height: 25px;
        border-radius: 5px;
        padding: 4px;
        border: solid thin #aaa;
        width: 100%
        
    }

    #button{
        padding: 11px;
        width: 100 px;
        color: white;
        background-color: darkgreen;
    }

    #box{

        background-color:lightseagreen;
        margin: auto;
        width: 500px;
        padding: 20px;
    }

    </style>

    <div id="box">
    
        <form method="post">
            <div style="font-size: 40px;margin: 10px;color: white;text-align:center;font-family:Arial">Register</div>
            <h3 style="color:white"><span style="font-family:Arial">Name</span></h3>
            <input id="text" type= "text" name="name" placeholder="Your name"><br><br>
            <h3 style="color:white"><span style="font-family:Arial">E-mail</span></h3>
            <input id="text" type= "email" name="email" placeholder="abc@me.com"><br><br>
            <h3 style="color:white"><span style="font-family:Arial">Password</span></h3>
            <input id="text" type= "password" name="password" placeholder="Enter a strong password"><br><br>

            <input id="button" type= "submit" value="Register"><br><br>

            <a href="login.php" style="color: white;">Already a member? Log in.</a>

        </form>
    </div>
    
</body>
</html>

