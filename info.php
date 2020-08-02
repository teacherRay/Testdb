if (isset($_POST['update'])){
    $classroom = $_POST['classroom'];
    $id = $_POST['id'];
    $pacomment = $_POST['pacomment'];   
    $mysqli->query("UPDATE data SET pacomment= '$pacomment' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    
    header('location: index.php');

}