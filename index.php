
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<br><h3 style="text-align: center;">Begin the semester by registering your courses on the Students Dashboard.</h3><br><br><br>
    <?php require_once 'process.php'; ?>

    <?php

    if(isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>

    <div class="row justify-content-center"> 
    <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Course</label>
        <input type="text" name="courses" class="form-control" 
            value="<?php echo $courses; ?>" placeholder=" Enter your course">
               
        </div>
        <div class="form-group">
        <label>Credit Unit</label>
        <input type="number" name="credit_unit" 
        value="<?php echo $credit_unit; ?>" class="form-control" placeholder=" Enter your credit unit">
        </div>
        <div class="form-group">
        <?php
        if ($update==true):
        ?>
            <button type="submit" class="btn btn-info" name="update">Update</button>
        <?php else: ?>
        <button type="submit" class="btn btn-primary" name="save">Save</button>
        <?php endif; ?>
        </div>
    </form>
    </div>
            <br><br><br>

    <div class="container">
    <?php
        $mysqli = new mysqli('localhost','root','','logindatabase') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM dashboardx") or die($mysqli_error);
        //pre_r($result);
        ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Courses</th>
                        <th>Credit Unit</th>
                        <th colspan="2">Action</th>
                    </tr>
                
                </thead>
        <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['courses']; ?></td>
                    <td><?php echo $row['credit_unit']; ?></td>           
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Edit</a>
                        <a href="process.php?delete=<?php echo $row['id']; ?>"
                            class="btn btn-danger">Delete</a>
                    </td>
                </tr>
        <?php endwhile; ?>

            </table>
        </div>



      <?php
        
        function pre_r ($array) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';


            }
    ?>

        <div>
<br><br><a href="logout.php"><h5 style="color:red;font-size:20px;text-align: center; ">Log Out</h3></a></h5><br>

        </div>

       <div>     
<a href="forgotpassword.php"><h5 style="color:red;font-size:20px;text-align: center; ">Reset Password</h5></a></h5> 
    </div>

</body>
