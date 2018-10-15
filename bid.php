

<!DOCTYPE html>
<html>
<head>
  <title>Bid</title>

  <style type="text/css">
    #myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
}

#myTable tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}
  </style>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advertise</title>
  <?php  include_once("head_include.php"); ?>
</head>

<?php

error_reporting(0);
//$_SESSION["user"] = "ahmed";
$id = $_SESSION['id']; //$post[id]
$picture;
$address;
$description;
$name;
$price; 

$_SESSION['propertyid'] = $id;///////////////


  $sql = "select * from property where id = {$id}";
  $result =query($sql);

  while ($row = mysqli_fetch_assoc($result)) {
     $name = $row['name'];
     $address = $row['address'];
     $description = $row['description'];
     $price = $row['price'];

  ?>

<body  data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php include_once("body_head.php"); ?>
  
<div class="container-fluid">
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2  box">
    <div>
      <p>
        <?php



            echo "<h2>Minimum bidding price: ".$price." taka</h2>";
  }

  
  //emon ekta sql likhte hbe propertyupload er time ei jeno property+id($tablename) er name e ekta table create hoi
  //propertyUpload.php te
  

  $sql2 = "select * from bid where propertyid = $id order by price  desc limit 20 ";
  $result2 = query( $sql2);

  
?>


      </p>
  <p>Top 20 bidders:</p>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table class="table-striped" id="myTable">
  <tr class="header">
    <th style="width:10%;">User</th>
    <th style="width:50%;">Name</th>
    <th style="width:50%;">Contact</th>
    <th style="width:40%;">Value</th>
  </tr>
  <?php
  
  while ($row2 = mysqli_fetch_assoc($result2)) {
     $user = $row2['userid'];
     
      $sql3 = "select name ,phone from user where id = '$user'";
      $result3 = $con->query( $sql3);
      while ($row3 = mysqli_fetch_assoc($result3)) {
        $username = $row3['name'];
        $phone=$row3['phone'];
      }
     $value = $row2['price'];
     echo "<tr>
            <td>".$user." </td>
            <td>".$username."</td>
            <td>".$phone." </td>
            <td>".$value."</td>
            </tr>";
            //update bid/newbid.php te ekta form thakbe
  }

  ?>
</table>











<div style="margin-top: 15px;"><!-- Modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal1">Update Your Bid</button>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Your Bid</h4>
      </div>
      <div class="modal-body">
        <form action="updatebid.php" method="post">
            <input class="form-control" type="number" name="uprice">
            <br>
            <input class="btn btn-default" type="submit" name="submit" value="Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>


<!-- Modal -->

<button style="float: right" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Create a Bid</button>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create a Bid</h4>
      </div>
      <div class="modal-body">
        <form action="newbid.php" method="post">
            <input class="form-control" type="number" name="iprice">
            <br>
            <input class="btn btn-default" type="submit" name="submit" value="Bid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
</div>



</div>
    </div>
    <div class="col-md-2"></div>
  </div>

  <?php include_once("body_foot.php"); ?>
</div>






</body>
</html>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
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
</script>
