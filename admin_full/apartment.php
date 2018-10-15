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
$type="Apartment";
if (!isset($screen))
  $screen = 0;
  $rows_per_page = 10;
  
$start = $screen * $rows_per_page;
$sql = "SELECT * FROM property WHERE type ='{$type}' ";
$sql .= "LIMIT $start, $rows_per_page";

$result = query($sql);

$total_records = mysqli_num_rows($result);
$pages = ceil($total_records / $rows_per_page);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
    <div class="display_row">
    	<div class="picture">
    		<?php
    		$id = $row["id"];

    		$sql1 = "Select * from propertyphoto where id = '{$id}'";

			$result1 = query($sql1);
			if ($result1->num_rows > 0) {
			    // output data of each row
    			while($row1 = $result1->fetch_assoc()) {
    				$photoid = $row1["photoid"];

    				$dir = "uploads";
    				$filename = $photoid . ".png";

    				echo "<img src='$dir/$filename'>";
    			}
    		}
	

    		

    		?>
    	</div>
    	<div class="text">
    		<?php
    		

    		echo "Name: " . $row['name'] . "<br> Location:" .$row['address'] ." <br> Price:" . $row['price']. "<br>";
    	?>

    	<form method="post" action="property_info.php">

    		<input type="hidden" name="id" value="<?php echo $id; ?>">
    		<input class="btn btn-primary" type="submit" name="submit" value="Details">
    	</form>
    	</div>
    	
    </div>
        <?php
    }
}
else 
{
  $error="No result found!!";
  $message = <<<DELIMITER
         <div  class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Sorry!</strong> $error</div>
DELIMITER;
echo $message;
}
// let's create the dynamic links now
if ($screen > 0) {
  $url = "example.php?screen=" . $screen - 1;
  echo "<a href=\"$url\">Previous</a>\n";
}
// page numbering links now
for ($i = 0; $i < $pages; $i++) {
  $url = "example.php?screen=" . $i;
  echo " | <a href=\"$url\">$i</a> | ";
}
if ($screen < $pages) {
  $url = "example.php?screen=" . $screen + 1;
  echo "<a href=\"$url\">Next</a>\n";
}
?>


        	
        
    	
    </div>
    <div class="col-md-2"></div>
  </div>

  <?php include_once("body_foot.php"); ?>
</div>



</body>
</html>
