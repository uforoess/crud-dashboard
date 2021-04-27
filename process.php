<?php

session_start();
$id=0;

$mysqli = new mysqli('localhost', 'root', '','logindatabase') or die(mysqli_error($mysqli));

$update = false;
$courses = '';
$credit_unit = '';

if (isset($_POST['save'])){
    $courses = $_POST['courses'];
    $credit_unit = $_POST['credit_unit'];

    $mysqli->query("INSERT INTO dashboardx (courses, credit_unit) VALUES('$courses', '$credit_unit')") or
        die($mysqli->error);

    $_SESSION['message'] = "Course has been added!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM dashboardx WHERE id=$id") or 
        die($mysqli->error());$_SESSION['message'] = "Course has been deleted!";
    
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM dashboardx WHERE id=$id") or die ($mysqli->error());
    If (is_array($result) && count($result) > 0) {
        echo 'Yes';
    } else {
        echo '';
    } 
        $row = mysqli_fetch_array($result);
        $courses =$row['courses'];
        $credit_unit = $row['credit_unit'];


    }

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $courses = $_POST['courses'];
    $credit_unit = $_POST['credit_unit'];


    $mysqli->query("UPDATE dashboardx SET courses='$courses', credit_unit='$credit_unit' WHERE id=$id") or
        die($mysqli->error);

    $_SESSION['message']="Course updated successfully!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');

}

