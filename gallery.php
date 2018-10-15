<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advertise</title>
  <?php  include_once("head_include.php"); ?>
</head>

<body  data-spy="scroll" data-target=".navbar" data-offset="50">
  <?php include_once("body_head.php"); ?>
  

<!-- //banner -->
<!-- gallery -->
	<div class="gallery">
		<div class="container">
			<h3>Our Properties</h3>

         <?php
         $i=0;
              $sql="SELECT * FROM propertyphoto";
              $result=mysqli_query($con,$sql);


             while($row=mysqli_fetch_assoc($result))
             {
	        //  echo " <img src='uploads/{$row['photoid']}.png' alt=''> ";
                    $id=$row['id'];
                    $sql1="SELECT * FROM property where id='$id'";
                    $result1=mysqli_query($con,$sql1);
                    while($row1=mysqli_fetch_assoc($result1))
                    {
                    	$name=$row1['name'];
                    	$des=$row1['description'];
                    	$price=$row1['price'];
                    	$add=$row1['address'];
                    }


             	if($i<=2)

	           { echo "<div class='col-md-4 gal-left'>
				<div class='content-grid-effect slow-zoom vertical text-center'>
					<a href='uploads/{$row['photoid']}.png' class='b-link-stripe b-animate-go  swipebox'>
						<div class='img-box'>
							<img src='uploads/{$row['photoid']}.png' alt='image' class='img-responsive zoom-img'>	
						</div>
				
						<div class='info-box'>
							<div class='info-content'>
								<h4>Real Plantation</h4>
								<span class='separator'></span>
								<div class='view'>
									<p class='pname'><b>{$name}<b></p>
									<p>BDT {$price} taka only</p>

									<p>{$add}</p>
									<p>{$des}</p>
									

								</div>
							</div>
						</div>
					</a>
				</div>
			</div>";
             }

             else
             {
             	echo "<div class='col-md-4 gal-left gal_mar'>
				<div class='content-grid-effect slow-zoom vertical text-center'>
					<a href='uploads/{$row['photoid']}.png' class='b-link-stripe b-animate-go  swipebox'>
						<div class='img-box'>
							<img src='uploads/{$row['photoid']}.png' alt='image' class='img-responsive zoom-img'>	
						</div>
				
						<div class='info-box'>
							<div class='info-content'>
								<h4>Real Plantation</h4>
								<span class='separator'></span>
								<div class='view'>
									<p class='pname'><b>{$name}<b></p>
									<p>BDT {$price} taka only</p>

									<p>{$add}</p>
									<p>{$des}</p>

								</div>
							</div>
						</div>
					</a>
				</div>
			</div>";
             }
             $i++;
         }





         ?>

  <?php include_once("body_foot.php"); ?>




</body>
</html>

