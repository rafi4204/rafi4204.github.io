<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advertise</title>
  <?php  include_once("head_include.php"); ?>
</head>

<body  data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php include_once("body_head.php"); ?>
  
<div class="container-fluid">
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2  box">

<?php

// database connection stuff here
//$email=_SESSION['email'];
if(!isset($_SESSION['email']))
{
    redirect("sign_in.php");
}
$id = $_POST['id'];
$_SESSION['id']=$id;
$sql = "SELECT * FROM propertyphoto where id = '{$id}'";   
$sql1 = "SELECT * FROM property where id = '{$id}'";
//$sql2 = "SELECT phone FROM user where email = '{$email}'";

$result = query($sql);
?>
<div class="details">

    <div class="display_gallery">
        
            <?php

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
            $photoid = $row["photoid"];

        $dir = "uploads";
            $filename = $photoid . ".png";

            echo "<img style='width:400px; height:300px;' src='$dir/$filename'>";
            //echo "$photoid";
          }
        }

            ?>
        </div>
        <div class="text_info" style="font-size: 20px;">
            <?php
        $result1 = query($sql1);        
        if ($result1->num_rows > 0) {
        // output data of each row
        while($row1 = $result1->fetch_assoc()) {

            echo "Name: " . $row1["name"] . "<br> Contact: ". $row1["phone"]." <br> Price: ". $row1["price"]." <br> Author: ". $row1["author"]." <br> Description: ". $row1["description"]." <br>";
      }


    }
        ?>

       
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
