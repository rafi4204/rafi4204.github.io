


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
  
 background-image: url('image16.JPG');
  
  background-size: cover;
  background-repeat: no-repeat;
  z-index: -1
} 
.btn-primary {
    color: #fff;
    background-color: #14171a;
    border-color: #2e6da4;
}
  </style>
</head>

<body  id="particles-js">
  <?php include_once("body_head.php"); ?>
  
<div class="container" style="opacity: 0.9; position:absolute;">
  <div class="row"> 
    <div class="col-md-8 col-md-offset-2  box">
<?php
// database connection stuff here
error_reporting(0);
$type="House";
if (!isset($screen))
  $screen = 0;
  $rows_per_page = 10;
  
$start = $screen * $rows_per_page;
$sql = "SELECT * FROM property ";
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
        

        echo "Name: " . $row['name'] ."<br> Author:" .$row['author']." <br> Price:" . $row['price']."<br> phone:" .$row['phone'] . "<br>";
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


<?php 
             /* if(!isset($_SESSION['email']))

              {
                echo ' <script type="text/javascript">alert("Please login to Buy books!");</script> ';

                header("location: home.php");
              }*/
                  ?>
