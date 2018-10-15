<?php 
 include_once("important.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Online Book Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="admin_style.css">
</head>
<body>
 

<section class="home_section">
  <div class="overlay">
    
     <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color: white; font-size: 130%;" href="#">Online Book Store</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li ><a href="index.php">Home</a></li>
      <li ><a href="users.php" >Users</a></li>
      <li class="active"  ><a href="posted_ad.php" >Posted Ads</a></li>
      <li ><a href="#">Log out</a></li>
    </ul>
  </div>
</nav>

 <?php

    $sql = "SELECT `name`, `description`, `author`, `price`,`phone`,`user` FROM `property` ORDER BY id";
    $result = query($sql);

     echo '<div class="row">
      <div class="col-md-1"></div>
  <div class="col-md-2"><p style="font-size: 170%; color: red; ">Book Name</p></div>
  <div class="col-md-2"><p style="font-size: 170%; color: red;">Description</p></div>
  <div class="col-md-1"><p style="font-size: 170%; color: red;">Author</p></div>
  <div class="col-md-1"><p style="font-size: 170%; color: red;">Price</p></div>
  <div class="col-md-2"><p style="font-size: 170%; color: red;">Phone</p></div>
  <div class="col-md-2"><p style="font-size: 170%; color: red;">Posted By</p></div>
  <div class="col-md-1"><p style="font-size: 170%; color: red;">Action</p></div>   
</div>' ;

     while ($row = $result->fetch_assoc()) {
     $name= $row['name'];
     $description = $row['description'];
     $author = $row['author'];
     $price = $row['price'];
      $phone = $row['phone'];
     $user = $row['user'];
     echo '<div class="row">
<div class="col-md-1"></div>
  <div class="col-md-2"><p style="font-size: 20px; color: white; ">'.$name.'</p></div>
  <div class="col-md-2"><p style="font-size: 20px; color: white;">'.$description.'</p></div>
  <div class="col-md-1"><p style="font-size: 20px; color: white;">'.$author.'</p></div>
  <div class="col-md-1"><p style="font-size: 20px;color: white;">'.$price.'</p></div>
   <div class="col-md-2"><p style="font-size: 20px; color: white;">'.$phone.'</p></div>
  <div class="col-md-2"><p style="font-size: 20px;color: white;">'.$user.'</p></div>
  <div class="col-md-1"><a href="delete_post.php" style="font-size: 20px; color: white;">Delete</a></div>
 
    </div>' ;
    $_SESSION['da_email'] = $user;
   }
     
    ?>



  </div>
</section>
</body>
</html>