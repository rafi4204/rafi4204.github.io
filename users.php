<!DOCTYPE html>
<html lang="en">
<head>
  <title>Advertise</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="admin_style.css">
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
  background-repeat: no-repeat;
  background-size: cover;
  
  z-index: -1
} 
  </style>

</head>

<body   id="particles-js">
  
  <?php include_once("admin_body_head.php"); ?>
<section style="opacity: 0.9; position:absolute; padding-left:50px;padding-top:50px;width:100%;height:100%;">
  <div >
    
      
   <?php

    $sql = "SELECT `id`, `name`, `email`, `phone` FROM `user` ORDER BY id";
    $result = query($sql);

     echo '<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-2"><p style="font-size: 30px; color: red;">ID</p></div>
  <div class="col-md-2"><p style="font-size: 30px; color: red;">Name</p></div>
  <div class="col-md-2"><p style="font-size: 30px; color: red;">Email</p></div>
  <div class="col-md-2"><p style="font-size: 30px; color: red;">Phone</p></div>
  <div class="col-md-2"><p style="font-size: 30px; color: red;">Action</p></div>
    <div class="col-md-1"></div>
</div>' ;

     while ($row = $result->fetch_assoc()) {
     $id= $row['id'];
     $name = $row['name'];
     $email = $row['email'];
     $phone = $row['phone'];
     echo '<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-2"><p style="font-size: 20px; color: Black; font-weight: 900;">'.$id.'</p></div>
  <div class="col-md-2"><p style="font-size: 20px; color: Black; font-weight: 900;">'.$name.'</p></div>
  <div class="col-md-2"><p style="font-size: 20px; color: Black; font-weight: 900;">'.$email.'</p></div>
  <div class="col-md-2"><p style="font-size: 20px; color: Black; font-weight: 900;">'.$phone.'</p></div>
  <div class="col-md-2"><form method="post" action="delete_user.php">
<input type="hidden" name="id" value="'. $id.'">
<input type="hidden" name="em" value="'. $email.'">
<input  style="size: 20%; color: white;"class="btn btn-primary" type="submit" name="submit" value="Delete">
</form>
  </div>
    <div class="col-md-1"></div>
    </div>' ;
   
   }
     
    ?>


    




  </div>
</section>v>

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
        "speed": 40,
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
