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
      <li  ><a href="admin.php">Home</a></li>
      <li class="active"><a href="users.php" >Users</a></li>
      <li ><a href="#" >Posted Ads</a></li>
      <li ><a href="#">Log out</a></li>
    </ul>
  </div>
</nav>
   <?php

    $sql = "SELECT `id`, `name`, `email`, `phone` FROM `user` ORDER BY id";
    $result = query($sql);

     echo '<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-2"><p style="size: 20%; color: red;">ID</p></div>
	<div class="col-md-2"><p style="size: 20%; color: red;">Name</p></div>
	<div class="col-md-2"><p style="size: 20%; color: red;">Email</p></div>
	<div class="col-md-2"><p style="size: 20%; color: red;">Phone</p></div>
	<div class="col-md-2"><p style="size: 20%; color: red;">Action</p></div>
    <div class="col-md-1"></div>
</div>' ;

     while ($row = $result->fetch_assoc()) {
     $id= $row['id'];
     $name = $row['name'];
     $email = $row['email'];
     $phone = $row['phone'];
     echo '<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-2"><p style="size: 20%; color: white;">'.$id.'</p></div>
	<div class="col-md-2"><p style="size: 20%; color: white;">'.$name.'</p></div>
	<div class="col-md-2"><p style="size: 20%; color: white;">'.$email.'</p></div>
	<div class="col-md-2"><p style="size: 20%; color: white;">'.$phone.'</p></div>
	<div class="col-md-2"><a href="delete_user.php" style="size: 20%; color: white;">Delete</a></div>
    <div class="col-md-1"></div>
    </div>' ;
    $_SESSION['du_email'] = $email;
    $_SESSION['du_id'] = $id;
   }
     
    ?>


    




  </div>
</section>



</body>
</html>