<!DOCTYPE html>
<html lang="en">
<head>



  <title>Home</title>
  <?php  include_once("head_include.php"); ?>


</head>

<style type="text/css">
  img{
    max-height: 550px;
  }
</style>



<body  data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php include_once("body_head.php"); ?>
  
  
<div class="container-fluid">
  <div class="row"> 
    <div class="col-md-12">

      <div class="top-hi-cost" style="text-align: center">
        <h1></h1>
      </div>

      <?php 

    $sql = "SELECT `id`, `name`, `description`, `user`, `date`, `price` FROM `property` ORDER BY price DESC LIMIT 3";
    $result = query($sql);

  

    $photoid = array(array());
    $id = array();
    $name = array();
    
    $price = array();
    $i = 0;

    while ($row = $result->fetch_assoc()) {
      # code...
      $id[$i] = $row['id'];
      $name[$i] = $row['name'];
    
      $price[$i] = $row['price'];

        $sql2 = "SELECT `photoid`, `id`, `date` FROM `propertyphoto` WHERE  id = '$id[$i]' ";

        $result2 = query($sql2);
        $j = 0;
        while ($row2 = $result2->fetch_assoc()) {
          $photoid[$i][$j] = $row2['photoid'];
          $j++;

        }

 
      $i++;
    }

    











     ?>

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <?php 
    $dir = "uploads/".$photoid[0][0].".png";
    echo "<img src='$dir'>";
     ?>
      
    </div>

   <div class="item">
    <?php 
    $dir = "uploads/".$photoid[1][0].".png";
    echo "<img src='$dir'>";
     ?>


   
    
    </div>

    <div class="item">
      <?php 
    $dir = "uploads/".$photoid[2][0].".png";
    echo "<img src='$dir'>";
     ?>
     
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>












      

 

    </div>

  </div>
  
<?php include_once("body_foot.php"); ?>

</div>



   




</body>
</html>
