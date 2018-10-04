<?php  
 $connect = mysqli_connect("localhost", "root", "", "school");  
 $output = '';  
  $order = $_POST["order"];  

if (isset($_POST["query"])) {
$search = mysqli_real_escape_string($connect, $_POST["query"]);
$sql = " SELECT * FROM student WHERE s_id LIKE '%".$search."%'  OR s_name LIKE '%".$search."%'  OR s_surname LIKE '%".$search."%'";
}
if($order == 'desc')  
 {  
      $order = 'asc';  
       $sql = "SELECT * FROM student ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  

 }  
 else if($order == 'asc')
 {  
      $order = 'desc';  
             $sql = "SELECT * FROM student ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 }  
else{
   $sql = "SELECT * FROM student ORDER BY s_id ASC";  
}
 $result = mysqli_query($connect, $sql);  
 $output .= '<table id=datatable class="table table-bordered">  
                <tr>  
                    <th width="10%"><a class="column_sort" id="id" data-order="'.$order.'" href="#"><center>ID_Number</center></a></th>  
                     <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">Name</a></th>  
                     <th><a class="column_sort" id="id" data-order="'.$order.'" href="#">Surname</a></th>  
                     <th></th>
                </tr>
                <tr>  
                <td id="add_id" contenteditable></td>
                <td id="add_first_name" contenteditable></td>  
                <td id="add_last_name" contenteditable></td>  
                <td width="5%"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">ADD</button></td>  
           </tr> ';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                    <td align="center" class="add_id" data-id0="'.$row["s_id"].'" contenteditable>'.$row["s_id"].'</td>  
                     <td class="add_first_name" data-id1="'.$row["s_id"].'" contenteditable>'.$row["first_name"].'</td>  
                     <td class="add_last_name" data-id2="'.$row["s_id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td width="5%">
                     <button type="button" name="delete_btn" data-id3="'.$row["s_id"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>  
                      </tr>  
           ';  
      }
      $output .= '</table>';
   
 }  
 else  
 {  
      $output .= '  <tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr></table>';  
 }  
 echo $output;  
 ?>