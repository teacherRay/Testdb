<?php
session_start();

$mysqli = new mysqli("localhost","ray","password","reports");

$id = 0;
$update = false;
$name = '';
$classroom = '';
$classtime = '';


if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if(isset($result->num_rows) && $result->num_rows > 0) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $classroom = $row['classroom'];
        $pacomment = $row['pacomment'];           
    }
   
}

if (isset($_POST['update'])){
    
    $id = $_POST['id'];
    $pacomment = $_POST['pacomment'];   
    $mysqli->query("UPDATE data SET pacomment= '$pacomment' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    
    header('location: index.php');

}