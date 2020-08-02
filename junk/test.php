<!DOCTYPE html>
<body>
<form action="" method="POST" target="_self">
<div>            
  </div>  
  <div>
    Insert Classname <input type="text" value= '107i am' name="classroom"><br>
    <input type="submit" value="Push me" name="pushme"><br>  
  </div>              
</form>                    

<?php
$mysqli = new mysqli("localhost","ray","password","reports");
$classroom = '107i am';

if (isset($_POST["pushme"])) {
  
  $classroom = $_POST['classroom'];
  $sql="SELECT id, studentid, name, classroom, pacomment FROM data WHERE classroom='$classroom'";
?>
<form>
  <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Classroom</th>
                            <th>PA Comment</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead> 
<?php                    
  if($result = $mysqli->query($sql)){
      while ($row = $result->fetch_assoc()) {    
  ?>                 
                      <tr>
                        <td><?php echo $row['studentid']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['classroom']; ?></td>
                        <td><?php echo $row['pacomment']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                      </tr>                 
  </table> 
  </form>  
  <?php
                                                } 
                                       }
} 
  ?>              
               
                                  

</body>
</html>