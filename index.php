<?php if(isset ($_POST["btnSelectClass"])){
$classroom = $_POST['classroom'];
} 
?>
<?php require_once 'process.php'; ?>
<?php $sql="SELECT id, studentid, name, classroom, pacomment FROM data WHERE classroom='$classroom'"; ?>
<?php $result = $mysqli->query($sql) or die($mysqli->error()); ?>

<?php
$mysqli = new mysqli("localhost","ray","password","reports");




if (isset($_POST["btnSelectClass"])) {  
  $classroom = $_POST['classroom'];
  $sql="SELECT id, studentid, name, classroom, pacomment FROM data WHERE classroom='$classroom'";
  $result = $mysqli->query($sql) or die($mysqli->error());
}
?>



<?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

<!DOCTYPE html>
<html>
    <head>
    <title>Home of English Reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<body>

<div class="topnav">
  <a class="active" href="#home">Select Program</a>
  <div class="search-container">
    <form action="index.php" method="POST" target="_self">
      <input type="text" value= "102i am" name="classroom"> 
      <button type="submit" value="Submit" name = "btnSelectClass"> <i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

 <?php $resultcomment = $mysqli->query("SELECT EnglishComment FROM comments"); ?>
 <div class="container" align-content-center>  

    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <h1><label><?php echo $name?></label></h1>
            </div>
            <div class="form-group">
                <h3><label><?php echo $classroom?></label></h3>
            </div>


            <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <h3><label>PA Teacher's Comment</label></h3> <select name = "pacomment">
               <?php
                    while($rows = $resultcomment-> fetch_assoc())
                    {
                      
                        $EnglishComment = $rows['EnglishComment'];
                        echo "<option value='$EnglishComment'>$name.$EnglishComment</option>";
                    }
                    ?></h2> 
                </select><br>
                <p>
              </div>  

            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <!-- <button type="submit" class="btn btn-primary" name="save">Save</button> -->
            <?php endif; ?>
            </div>
        </form>

    <!-- ************************************** Begin Setup Table Headers ******************************************   -->        
            <div class="row justify-content-center">
                <table class="table" width = "20%" border = "5" cellpadding = "1";>
                    <thead>
                        <tr>
                            <th><center>Action</center></th>
                            <th><center>ID</center></th>
                            <th>Name and Comment</th>
                            
                            

                        </tr>
                    </thead>
                    
    <!-- ************************************** End Setup Classlist Table Headers ******************************************   -->
    
    <!-- ****** Loop thru Every Record From $result Query Variable and get variables and echo each variable into the table rows  **********   -->
            <?php
                while ($row = $result->fetch_assoc()): ?>

            <tr>
                        <td>
                        <center><a href="index.php?edit=<?php echo $row['id']; ?>"
                            class="btn btn-info">Assess</a></center>                         
                        </td>
    <!-- ************************************** Put data into Classlist table rows ******************************************   -->
                    
                        <td><center><?php echo $row['studentid']; ?></center></td>
                        <td><?php echo $row['name']." ".$row['pacomment'] ?></td>
                        
                   </tr>
                  
            <?php endwhile; ?>  <!-- ****************** End While() Loop ****************************   --> 
    
                </table> <!-- *************** End of Classlist Table  ******************************************   -->

            </div> 
   
        </div>
        </div>
    </body>

    </html>