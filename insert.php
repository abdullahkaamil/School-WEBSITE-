<?php  
 $connect = mysqli_connect("localhost", "root", "", "school");  
 $sql = "INSERT INTO student(s_id,s_name, s_surname) VALUES('".$_GET["id"]."','".$_GET["first_name"]."', '".$_GET["last_name"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 