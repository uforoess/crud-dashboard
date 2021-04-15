
<!DOCTYPE html>
<html>
<head>
    <title>Reset password</title>
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
            <div style="font-size: 35px;margin: 10px;color: white;text-align:center;font-family:Arial">Reset password</div>
            <h3 style="color:white"><span style="font-family:Arial">E-mail</span></h3>
            <input id="text" type= "email" name="email"  placeholder="Enter your email address"><br><br>

            <input id="button" type= "submit" value="Reset"><br><br>

            <a href="login.php" style="color: white;">go back to login</a><br>

            


        </form>
    </div>

</body>
</html>

