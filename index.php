<?php
session_start();

include ("connection.php");
include ("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Uforo's Blog</title>
        <style type="text/css">
            body
            {
                padding: 0;
                margin: 0;
                background: burlywood;
            }    
            h1
            {
                font-size: 5em;
                margin: 0;
                padding: 0;
                text-align: center;
                font-family: 'arial';
                position:absolute;
                top: 50%;
                left: 50%;
                transform:translateX(-50%) translateY(-50%);

            }
            </style>

            
</head>

<body>

<h1>Welcome <?php echo $user_data['name'];?>, You have reached the end of this project.<br> 
<a href="logout.php"><h3 style="color:red;font-size:x-large">Log Out</h3></a></h1> 
</div>
</body>
</html>
   
   