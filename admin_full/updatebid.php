 <?php 
  include_once("head_include.php");

  $id = $_SESSION['propertyid'];
  $usermail = $_SESSION['email'];
  echo $usermail;
  $price = $_POST['uprice'];

  $sql = "select * from user where email = '{$usermail}'";
  $result = query($sql);

  while ($row = mysqli_fetch_assoc($result)) {
    # code...
    $userid = $row['id'];
    echo $userid;
   } 
$sql2 = "UPDATE `bid` SET `price` = '$price' WHERE `bid`.`userid` = '$userid'";
  // $sql2 = "INSERT INTO `bid`(`propertyid`, `userid`, `price`, `time`) VALUES ('$id','$userid','$price',CURRENT_TIMESTAMP)";

 $result2 = query($sql2);

 redirect("home.php");





 ?>

