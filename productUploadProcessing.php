<?php


include("init.php");


$name = $_POST["name"];
    
    $description = $_POST["description"];
    
    $address = $_POST["address"];

    $type = $_POST["type"];
    $price = $_POST["price"];
    
    $division = $_POST["div"];

    $district = $_POST["district"];
    
    $houseNo = $_POST["houseNo"];

    $roadNo = $_POST["roadNo"];
    
    $sector = $_POST["sectorNo"];

    
    $user = $_SESSION['email'];
	$photoid = array('1', '2', '3');
	$i = 0;

	$sql = "INSERT INTO `property` (`id`, `name`, `description`, `user`, `date`, `price`, `address`, `houseno`, `roadno`, `sector`, `district`, `division`, `type`) VALUES (NULL, '$name','$description','$user', CURRENT_TIMESTAMP, '$price', '$address', '$houseNo', '$roadNo', '$sector', '$district', '$division', '$type')";
    $result=query($sql);
	

	$sql = "SELECT `id` FROM `property` ORDER BY id DESC limit 1";

	$result=query($sql); 
	//or die("Error quering database1.");

	
	while ($row = mysqli_fetch_assoc($result)) {
		
		$id = $row['id'];
	}



	$sql = "INSERT INTO `propertyphoto`(`id`) VALUES ('{$id}')";
	$result=query($sql);
	//or die("Error quering database2.");

	$sql = "INSERT INTO `propertyphoto`(`id`) VALUES ('{$id}')";
	$result=query($sql); 
	//or die("Error quering database2.");

	$sql = "INSERT INTO `propertyphoto`(`id`) VALUES ('{$id}')";
	$result=query($sql);
	//or die("Error quering database2.");

	$sql = "SELECT `photoid` FROM `propertyphoto` ORDER BY photoid DESC";	

	$result=query($sql);
//	or die("Error quering database3.");
	$j = 0;
	while ($row = mysqli_fetch_assoc($result)) {
		
		$photoid[$j] =  $row['photoid'];
		$j++;
	}
	

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$_SESSION["target_file"] = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$newName = "uploads/".$photoid[0].".png";

rename($target_file, $newName);







$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
$_SESSION["target_file"] = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload1"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$newName = "uploads/".$photoid[1].".png";

rename($target_file, $newName);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$_SESSION["target_file"] = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload2"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$newName = "uploads/".$photoid[2].".png";

rename($target_file, $newName);


?>