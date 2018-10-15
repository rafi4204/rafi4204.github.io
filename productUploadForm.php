

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Books</title>
  <?php  include_once("head_include.php"); ?>

 <style type="text/css">
  
label
{
  color: white;
}
#particles-js {
  
  width: 100%;
  height: 100%;
  
 background-image: url('image2.JPG');
  
  background-size: cover;
  
  z-index: -1
} 
  </style>

</head>

<body id="particles-js">
  <?php include_once("body_head.php"); ?>
  
<div class="container " style="opacity: 0.9; position:absolute; padding-left:250px; ">
  <div class="row box"> 
    <div class="col-md-8 col-md-offset-2">
      <div class="product-upload-form-body">
          <p class="login-box-msg"><marquee style="color:white;"> Upload your Books</marquee></p>
         <?php   

         if($_SERVER['REQUEST_METHOD'] == "POST")   
             {$name = $_POST["name"];
    
    $description = $_POST["description"];
    
    $phone = $_POST["phone"];

   
    $price = $_POST["price"];
    $author=$_POST["author"];
    
    

    
    $user = $_SESSION['email'];
  $photoid = array('1', '2', '3');
  $i = 0;

  $sql = "INSERT INTO `property` (`id`, `name`, `description`, `user`, `date`, `price`,`phone`,`author`) VALUES (NULL, '$name','$description','$user', CURRENT_TIMESTAMP, '$price','$phone','$author')";
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

  

  $sql = "SELECT `photoid` FROM `propertyphoto` ORDER BY photoid DESC"; 

  $result=query($sql);
//  or die("Error quering database3.");
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

$newName = "uploads/".$photoid[0].".png";

rename($target_file, $newName);









  


// Check if image file is a actual image or fake image


redirect("home.php");
}

          ?>
          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="name">Book Name:* </label>
              <input type="text" class="form-control" placeholder="Property Name" name="name" required>
              <span class=""></span>
            </div>
            
             <div class="form-group">
               <label for="type">Author:*</label>
                <input type="text" class="form-control" placeholder="author" name="author" required>
              <span class=""></span>
                </div> 
            
            <div class="form-group">
              <label>Phone:* </label>
              <input type="text" class="form-control" placeholder="phone" name="phone" required>
              <span class=""></span>
            </div>

             <div class="form-group">
              <label>Price:* </label>
              <input type="number" class="form-control" placeholder="price" name="price" required>
              <span class=""></span>
            </div>

</div> 
            
            <div class="form-group">
              <label>Description:* </label>
              <input type="text" class="form-control" placeholder="Description" name="description" required>
              <span class=""></span>
            </div>
            <div class="form-group">
              <label>Picture:* </label>
              <p class="file-upload" style="color:white;">Upload pictures of the Books (you must upload one picture of format jpg/png):*</p>
              
                <input type="file"  class="inputfile" name="fileToUpload" accept="image/*" required>
                
              <span class=""></span>
            </div>

            
            <div>
              <p style="color:white;">By clicking <kbd>Upload Book</kbd>  you are agreed that the information you are giving here are true. You will be responsible for any false information.</p>
            </div>
            <div class="">
              <div class="form-group">
               <button type="submit" class="btn btn-primary">Upload Book</button>
              </div>
            </div>

          </form>
        </div>
    </div>
    <div class="col-md-2"></div>
  </div>


<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- stats.js lib -->


     

   <script type="text/javascript">// ParticlesJS Config.
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 700
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
    },
    "opacity": {
      "value": 0.4,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 30,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": .5,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "grab"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});
</script> 
  



</body>
</html>

