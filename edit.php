<?php  
 $connect = mysqli_connect("localhost", "root", "", "school");  
 $id = $_GET["id"];  
 $text = $_GET["text"];  
 $column_name = $_GET["column_name"];  
$sql = "UPDATE student SET ".$column_name." = '".$text."' WHERE s_id= '".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }
 ?>