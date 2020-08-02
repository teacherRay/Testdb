<?php
session_start();

$conn = new mysqli("localhost","ray","password","reports") or die(mysqli_error($mysqli));

$classroom = $_POST['classroom'];


$sql="SELECT id, name, pacomment, classroom FROM data WHERE classroom='$classroom'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["classroom"]. " ".$row["pacomment"] ."<br>";
         
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?>
<br><br>
<a href="index.php">Choose another Classroom</a>