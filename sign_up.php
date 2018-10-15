<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    
   
  <title>Advertise</title>
  <?php  include_once("head_include.php"); ?>
  <style type="text/css">
  
label
{
  color: white;
}
#particles-js {
  
  width: 100%;
  height: 100%;
  
 background-image: url('image9.JPEG');
  
  background-size: cover;
  background-position: 50% 50%;
  z-index: -1
} 
  </style>
</head>

<body  id="particles-js">
  
 <?php include_once("body_head.php"); ?>
  
    
  

  
<div  class="container "style="opacity: 0.9; position:absolute; padding-left:200px; " >
 
 
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2  box" >
        
    	<div >
        

        <?php 

         $errors=[];
$success=[];
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $name = $_POST['name'];
   
    $phone = $_POST['phone'];
   
    $email = $_POST['email'];
   
    

    
   
    
    
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
         $pid;
         

              
    if(email_exist($email))
    {
      $errors[]="Sorry! this email already registered";
      //echo "it works";
    }

    else
    {    $sql="INSERT INTO `user` (`id`, `email`, `name`,  `password`, `phone`,`photoid`) VALUES (NULL, '$email', '$name',  '$password', '$phone','')";


      
      $result=query($sql);
      confirm($result);
      



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


         ?>


    		<form   class="form" method='post' action=''  enctype="multipart/form-data">
    			<marquee style="color:white;">Create a new account</marquee>
    			<div class="form-group">
              <label>Full Name:*</label>
              <input type="text" class="form-control" placeholder="Full Name" name="name" required>
              <span class=""></span>
            </div>
            <div class="form-group">
              <label>Phone No:* </label>
              <input type="number" class="form-control" placeholder="Phone No" name="phone" required>
              <span class=""></span>
            </div>
            <div class="form-group">
              <label>Email:* </label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
              <span class=""></span>
            </div>
            
           
            
            <div class="form-group">
              <label>Password:* </label>
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class=""></span>
            </div>
            <div class="form-group">
              <label>Confirm Password:* </label>
              <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required>
              <span class=""></span>
            </div> 

            

            <div class="">
              <div class="form-group">
               <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </div>
            
    		</form>
    	</div>
   
   </div>
   <div class="col-md-2"></div>
 </div>
  </div>

  



 

 




 
  


<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<!-- stats.js lib -->


     

   <script type="text/javascript">// ParticlesJS Config.
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 150,
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
      "value": 0.5,
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
        "mode": "repulse"
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
