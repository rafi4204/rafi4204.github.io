<?php

function clean($string)
{

	return htmlentities($string);

}

function redirect($location)
{

    return header("Location: $location");

}


function set_message($message)
{
	if(!$message)
	{

		$_SESSION['message'] = $message;
	}
	else
	{
		$message="";
	}
}


function display_message()
{

	if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function email_exist($email)
{
    $sql="SELECT email FROM user WHERE email='$email'";
    $result=query($sql);
    if(row_count($result)==1)
    {
    	return true;
    }
    else
    {
    	return false;
    }

}

function admin_email_exist($email)
{
    $sql="SELECT email FROM admin WHERE email='$email'";
    $result=query($sql);
    if(row_count($result)==1)
    {
    	return true;
    }
    else
    {
    	return false;
    }

}



function check_password($email,$password)
{
    $sql="SELECT password FROM user WHERE email='$email'";
    $result=query($sql);
    $row=fetch_array($result);
   if($password==$row['password'])
   {
   	
   	return true;
   }
else
	{

		return false;
	}

}

function admin_check_password($email,$password)
{
    $sql="SELECT password FROM admin WHERE email='$email'";
    $result=query($sql);
    $row=fetch_array($result);
   if($password==$row['password'])
   {
   	
   	return true;
   }
else
	{

		return false;
	}

}



function tojen_generator()
{
    $token=$SESSION['token']=md5(uniqid(mt_rand(), true));

      return $token; 

}

function register()
{
$errors=[];
$success=[];
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$name = $_POST['name'];
		$birthno = $_POST['birthNo'];
		$phone = $_POST['phone'];
		$nid = $_POST['nid'];
		$email = $_POST['email'];
		$birthday = $_POST['birthday'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$houseNo = $_POST['houseNo'];
		$road = $_POST['road'];
		$thana = $_POST['thana'];

		
		$sector = $_POST['sector'];
		$zipCode = $_POST['zipCode'];
		$post = $_POST['po'];
		$district = $_POST['district'];
		$division= $_POST['div'];
		
		
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
         $pid=0;
         $pid++;

              $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$_SESSION["target_file"] = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

		if(email_exist($email))
		{
			$errors[]="Sorry! this email already registered";
			//echo "it works";
		}

		else
		{    $sql="INSERT INTO `user` (`id`, `email`, `name`, `fname`, `mname`, `birthday`, `birthno`, `nid`, `houseno`, `road`, `sector`, `post`, `zipCode`, `thana`, `district`, `division`, `password`, `phone`,`photoid`) VALUES (NULL, '$email', '$name', '$fname', '$mname', '$birthday', '$birthno', '$nid', '$houseNo', '$road', '$sector', '$post', '$zipCode', '$thana', '$district', '$division', '$password', '$phone','$pid')";


			
			$result=query($sql);
			confirm($result);


            


        if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $as= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";


         $message = <<<DELIMITER
         <div  class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>$as</strong>  </div>
DELIMITER;
echo $message;

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$newName = "uploads/".$pid.".png";

rename($target_file, $newName);



			$message = <<<DELIMITER
				 <div  class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Congratulation!</strong> you have successfully registered </div>
DELIMITER;
echo $message;
		}

		if(!empty($errors))
		{
			foreach ($errors as $error) {
				$message = <<<DELIMITER
				 <div  class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> $error</div>
DELIMITER;
echo $message;
			}
		}
	}

}


function login()
{
   // $_SESSION['logout']=0; 
	$errors=[];
$success=[];

      if(isset($_SESSION['email']))
      {
      	redirect("home.php");
      }
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$cpassword = $_POST['cpassword'];

        
            

		if(!email_exist($email) || !check_password($email,$password))
		{
			$errors[]="email or password is incorrect";
			//echo "it works";
		}

		else
		{
			$_SESSION['email']=$email;
			  $_SESSION['logout']=1;
			redirect("home.php");
			
		}

		if(!empty($errors))
		{
			foreach ($errors as $error) {
				$message = <<<DELIMITER
				 <div  class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Sorry!</strong> $error</div>
DELIMITER;
echo $message;
			}
		}
	}

}

function admin_login()
{
   // $_SESSION['logout']=0; 
	$errors=[];
$success=[];

      if(isset($_SESSION['admin']))
      {
      	redirect("admin.php");
      }
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$cpassword = $_POST['cpassword'];

        
            

		if(!admin_email_exist($email) || !admin_check_password($email,$password))
		{
			$errors[]="email or password is incorrect";
			//echo "it works";
		}

		else
		{
			$_SESSION['admin']=$email;
			  $_SESSION['logout']=1;
			redirect("admin.php");
			
		}

		if(!empty($errors))
		{
			foreach ($errors as $error) {
				$message = <<<DELIMITER
				 <div  class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Sorry!</strong> $error</div>
DELIMITER;
echo $message;
			}
		}
	}

}

function logged_in()
{
	if(isset($_SESSION['email']))
		return true;
	else
		return false;
}







?>