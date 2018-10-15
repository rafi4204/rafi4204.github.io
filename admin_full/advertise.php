<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sell</title>
  <?php  include_once("head_include.php"); ?>
   <style type="text/css">
  
label
{
  color: white;
}
#particles-js {
  
  width: 100%;
  height: 100%;
  
 background-image: url('image13.JPG');
   background-repeat: no-repeat;
  background-size: cover;
  
  z-index: -1
} 
  </style>
</head>

<body  id="particles-js">
  <?php include_once("body_head.php"); ?>
  
<div class="container-fluid"  >
  <div class="row box"> 
  	<div class="col-md-8 col-md-offset-2">
  		<div class="text" >
        <div style="background-color:white;opacity: 0.5; margin-top:100px;">
  			<p class="advertisement-text">We are providing a platform to buy&sell books. To  sell books ,You have to login your account first. </p>
  			</div>
  			<p>
     
  				<button  style="background-color:#14bc98;opacity: 0.8;" type="button" class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#myModal1">post</button>
           
           <div id="myModal1" class="modal fade" role="dialog" >
  <?php  
  if(!isset($_SESSION['email']))
{
   


  echo '<div class="modal-dialog" >

    <!-- Modal content-->
    <div class="modal-content" style="background: #2B282B;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: white;">Please login to your account.</h4>
      </div>
      <div class="modal-body">
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" ><a href="sign_in.php">Login</a></button>
      </div>'; }

  else
     redirect("productUploadForm.php");
      
       ?>
    </div>
</div>
</div>

  			</p>
        
  		</div>
  	</div>
  	<div class="col-md-2"></div>
  </div>




</body>
</html>