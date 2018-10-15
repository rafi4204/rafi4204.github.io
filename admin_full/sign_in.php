<!DOCTYPE html>
<html lang="en">
<head>
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
  background-repeat: no-repeat;
  background-size: cover;
  
  z-index: -1
} 
  </style>

</head>

<body   id="particles-js">
  <?php include_once("body_head.php"); ?>
  
<div class="container" style="opacity: 0.9; position:absolute; padding-left:200px;padding-top:100px;">
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2  box">
    	<div>
        <?php login();?>
    		<form method='post' action=''>
    			<marquee style="color:white;">Log in to your account</marquee>
    			<div class="form-group">
              <label>Email: </label>
              <input type="email" class="form-control" placeholder="Email" name="email" required>
              <span class=""></span>
            </div>
            <div class="form-group">
              <label>Password: </label>
              <input type="password" class="form-control" placeholder="Password" name="password" required>
              <span class=""></span>
            </div>
            
            <div class="">
              <div class="form-group">
               <button type="submit" class="btn btn-primary">Sign In</button>
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
