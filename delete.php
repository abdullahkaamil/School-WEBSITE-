<?php
 $connect = mysqli_connect("localhost", "root", "", "school");
 $sql = "DELETE FROM student WHERE s_id = '".$_GET["id"]."'";  
 if(mysqli_query($connect, $sql))
 {
      echo 'Data Deleted';
 }
 ?>
