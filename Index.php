<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School Website </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body> 
               <br />  
                <br />   
                <br /> 
        <div class="container" style="width:1000px;" align="center" id="data">
        <!-- table of the data loaded from mysql -->
        <table id="datatable" class="table table-bordered table-md" cellspacing="0">  
               <thead>
                 
                    <th class="th-sm" width="15%" onclick="sortTablebyId()">ID_Number <span class="glyphicon glyphicon-sort"></span></th>  
                     <th class="th-sm" onclick="sortTable(1)">Name  <span class="glyphicon glyphicon-sort"></span></th>  
                     <th class="th-sm" onclick="sortTable(2)">Surmame <span class="glyphicon glyphicon-sort"></span></th>  
                     <th class="th-sm" ></th>
<tr>
        <th width="10%">
            <input type="text" size=10 id="myInput" onkeyup="searchforid()" placeholder="Search by Id">
        </th>
          <th>
          <input type="text" id="myInput2" size=33 onkeyup="searchforname()" placeholder="Search by name">
          </th>
          <th>
          <input  type="text" id="myInput3" size=33 onkeyup="searchforsurname()" placeholder="Search by surname">
          </th>
          <th><button onclick="clearsearch()" >Clear</button> </th>
        </tr>
        <!-- place of the inputing the values for the student  -->
        
                    <th width="10%">
                    <input type="text" size=6 name="id" id="add_id" /></th>  
                     <th ><input type="text"size=33 name="first_name" id="add_first_name" /></th>  
                     <th><input type="text" size=33 name="last_name" id="add_last_name" /></th>  
                     <th width="5%"><button onclick="addRowJS();">Add</button></th>
                     </thead>
              <tbody>
                      <?php     //connection to the mysql database
                $con = mysqli_connect('localhost', 'root', '', 'school');
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $sql = "SELECT * FROM student ORDER BY s_id ASC";
                if ($result = mysqli_query($con, $sql)) {
                  $rowcount = mysqli_num_rows($result);
                  if ($rowcount > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
          <tr>
                     <td class="id" id="<?php echo $row['s_id']; ?>" onclick="edit(this,'<?php echo $row['s_id'] ?>','s_id')" ><?php echo $row['s_id'] ?></td>
                     <td class="first_name" id="<?php echo $row['s_id']; ?>" onclick="edit(this,'<?php echo $row['s_id'] ?>','s_name')"><?php echo $row["s_name"] ?></td>  
                     <td class="last_name" id="<?php echo $row['s_id']; ?>" onclick="edit(this,'<?php echo $row['s_id'] ?>','s_surname')"><?php echo $row["s_surname"] ?></td>  
                     <td width="5%">
                     <input type="button"  data-id3=<?php echo $row['s_id'] ?> value="Delete" onclick="deleteRowJS(this);deleteRowPHP('<?php echo $row['s_id'] ?>');"/></td>
                    </tr>
      <?php 
    } ?> 
    </tbody>
    </table>  
        <?php 
      }
    } else
      echo "That was an error";
    ?>
</div> 
</body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
  </html>
 <script>
 
 var table = document.getElementById('datatable');
 function addRowJS(){
            var flag = true;
             var input, filter, table, tr, td, i;
             input = document.getElementById("add_id").value;
             table = document.getElementById("datatable");
             tr = table.getElementsByTagName("tr");
             for (i = 0; i < tr.length; i++) {
               td = tr[i].getElementsByTagName("td")[0];
               if (td) {
                 if (Number(td.innerHTML) == Number(input)) {
                  alert("ID already exsisted !!");
                  flag = false;
                 }
               } 
             }
             alert(flag);
            if (flag) {
              var id = document.getElementById('add_id').value;
              var firstname = document.getElementById('add_first_name').value;
              var lastname = document.getElementById('add_last_name').value;
              document.getElementById('datatable');
              var newRow = table.insertRow(3);

                  if (id!=""&&firstname!=""&&lastname!="") {
                  var cel1 = newRow.insertCell(0);
                  var cel2 = newRow.insertCell(1);
                  var cel3 = newRow.insertCell(2);
                  var cel4 = newRow.insertCell(3);
                  cel1.innerHTML = id;
                  cel2.innerHTML = firstname;
                  cel3.innerHTML = lastname; alert();
                  //cel4.innerHTML = "<input type=button value=Sil onclick=\"deleteRowJS(this);deleteRowPHP('" + id + "')\"/>";
                  var td = document.createElement('INPUT');
                    td.setAttribute("type","button");
                   // td.setAttribute("value","sil");
                    td.value="Delete"; 
                    td.setAttribute("onclick","deleteRowJS(this);deleteRowPHP('" + id + "')");
                    cel4.appendChild(td);

                  //   var td = document.createElement('INPUT');
                  //   td.setAttribute("type","button");
                  //    td.value="Edit";
                  //   td.setAttribute("onclick","editjs(this);editphp('"+ id +"')");
                  //  cel4.appendChild(td);

                    addRowPHP();
                    document.getElementById('add_id').value="";
                    document.getElementById('add_first_name').value="";
                    document.getElementById('add_last_name').value="";
                  }
                }
            }
function addRowPHP(){
 var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("datatable").innerHTM = this.responseText;
           alert(this.responseText);
       }
    };
    var tmp = "add.php?id="+ document.getElementById('add_id').value 
                  + "&first_name=" + document.getElementById('add_first_name').value
                + "&last_name=" + document.getElementById('add_last_name').value;
    alert(tmp);
    xhttp.open("GET", tmp, true);
    xhttp.send(); }

function deleteRowJS(btn) {
  var row = btn.parentNode.parentNode;
  row.parentNode.removeChild(row);}
function deleteRowPHP(no) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
       }
    };
    var tmp = "delete.php?id="+ no; 
    alert(tmp);
    xhttp.open("GET", tmp, true);
    xhttp.send();}

function searchforid() {
 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable");
  tr = table.getElementsByTagName("tr");
  for (i = 2; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function searchforname() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable");
  tr = table.getElementsByTagName("tr");
  for (i = 2; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
function searchforsurname() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable");
  tr = table.getElementsByTagName("tr");
  for (i = 2; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }}
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("datatable");
  switching = true;
  
  dir = "asc"; 
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("tr");
    for (i = 3; i < (rows.length - 1); i++) {
      shouldSwitch = false;
     
      x = rows[i].getElementsByTagName("td")[n];
      y = rows[i + 1].getElementsByTagName("td")[n];
      if (dir == "asc") { 
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function sortTablebyId() {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("datatable");
  switching = true;
  dir = "asc"; 
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("tr");
    for (i = 3; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[0];
      y = rows[i + 1].getElementsByTagName("td")[0];
      if (dir == "asc") {
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (Number(x.innerHTML) < Number(y.innerHTML)) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++;      
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function edit(td,no,column_name){
  td.innerHTML = "<input type=text name=ad id=tdinner value = "+td.innerHTML + ">"
                    document.getElementById("tdinner").onchange = function() {editPHP(td,no,column_name)};
                 td.onclick=null;
}
function editPHP(td,no,column_name){
    var x1 = document.getElementById("tdinner").value;
    alert(x1);
    td.innerHTML = x1;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
       }
    };
    var tmp = "edit.php?id="+ no
                  + "&text=" + x1
                + "&column_name=" + column_name;
    alert(tmp);
    xhttp.open("GET", tmp, true);
    xhttp.send(); 
}
function clearsearch(){
  document.getElementById('myInput').value="";
  document.getElementById('myInput2').value="";
  document.getElementById('myInput3').value="";
}
//paging 
var $table = document.getElementById('datatable');
$n = 10;
$rowCount = $table.rows.length;
$firstRow = $table.rows[0].firstElementChild.tagName;
$hasHead = ($firstRow ==="TH");
$tr = [];
// loop counters, to start count from rows[1] (2nd row) if the first row has a head tag
$i=0,$ii=0,$j = ($hasHead)?1:0;
// holds the first row if it has a (<TH>) & nothing if (<TD>)
$th = ($hasHead?$table.rows[(0)].outerHTML:"");
// count the number of pages
var $pageCount = Math.ceil($rowCount / $n);
// if we had one page only, then we have nothing to do ..
if ($pageCount > 1) {
	// assign each row outHTML (tag name & innerHTML) to the array
	for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
		$tr[$ii] = $table.rows[$i].outerHTML;
	// create a div block to hold the buttons
	$table.insertAdjacentHTML("afterend","<div id='buttons'></div");
	sort(1);
}

// ($p) is the selected page number. it will be generated when a user clicks a button
function sort($p) {
	/* create ($rows) a variable to hold the group of rows
	** to be displayed on the selected page,
	** ($s) the start point .. the first row in each page, Do The Math
	*/
	var $rows = $th,$s = (($n * $p)-$n);
	for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
		$rows += $tr[$i];
	
	// now the table has a processed group of rows ..
	$table.innerHTML = $rows;
	// create the pagination buttons
	document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
	// CSS Stuff
//	document.getElementById("id"+$p).setAttribute("class","active");
}
function pageButtons($pCount,$cur) {
	/* this variables will disable the "Prev" button on 1st page
	   and "next" button on the last one */
	var	$prevDis = ($cur == 1)?"disabled":"",
		$nextDis = ($cur == $pCount)?"disabled":"",
		/* this ($buttons) will hold every single button needed
		** it will creates each button and sets the onclick attribute
		** to the "sort" function with a special ($p) number..
		*/
		$buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
	for ($i=1; $i<=$pCount;$i++)
		$buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
	$buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
	return $buttons;
}
 
 
 
 
 </script>