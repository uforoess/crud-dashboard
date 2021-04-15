
<?php

session_start();
    include ("connection.php");
    include ("functions.php");

 
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $password = $_POST['password'];
        $email = $_POST['email'];

        if(!empty($password)  && !empty($email) && !is_numeric($email))
        {

            //read from database
            $query = "select * from users where email = '$email' limit 1";

            $result = mysqli_query($con, $query);

            if ($result)
            {
              if ($result && mysqli_num_rows($result) > 0) 
              {

                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                     header("Location: index.php");
                    die;

                }

              } 

            }
            
            echo '<script>alert("Wrong email address or password!")</script>';

        }else
        {
            echo '<script>alert("Please enter some valid information!")</script>';
        }


    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
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
        padding: 10px;
        width: 100 px;
        color: white;
        background-color: darkgreen;
    }

    #box{

        background-color: lightseagreen;
        margin: auto;
        width: 500px;
        padding: 20px;
    }

    </style>

    <div id="box">
    
        <form method="post">
            <div style="font-size: 35px;margin: 10px;color: white;text-align:center;font-family:Arial">Log in</div>
            <h3 style="color:white"><span style="font-family:Arial">E-mail</span></h3>
            <input id="text" type= "email" name="email"  placeholder="Enter your email address"><br><br>
            <h3 style="color:white"><span style="font-family:Arial">Password</span></h3>
            <input id="text" type= "password" name="password"  placeholder="Enter your password"><br><br>

            <input id="button" type= "submit" value="Login"><br><br>

            <a href="register.php" style="color: white;">Not a member? Register now.</a><br>
            <a href="forgotpassword.php" style="color: white;">Forgot password</a>

            


        </form>
    </div>
    
</body>
</html>

