<nav class="navbar navbar-inverse" id="asd"data-spy="affix" data-offset-top="150" style="border-radius: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar linkcolor"></span>
        <span class="icon-bar linkcolor"></span>
        <span class="icon-bar linkcolor"></span>                        
      </button>
      <a class="navbar-brand" href="#"><b>Online Book Store</b></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class=""><a href="home.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Properties<span class="caret"></span></a>
          <ul class="dropdown-menu"  style="background: #333;">
            <li>
              <a  class="test"  href="house.php" style="color: #4b586d;">buy</a>

              

            </li>
            <li><a     href="advertise.php" style="color: #4b586d;" >sell</a></li>
                 
          </ul>
        </li>
        
        <li class=""><a href="helpline.php">Helpline</a></li>
        
      </ul>
      <form action="search_result.php" method="post"class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" name="search" placeholder="Search" style="border-radius: 0px;">
      </div>
      <button type="submit" class="btn btn-default"  style="border-radius: 0px;"><span class="glyphicon glyphicon-search"></span></button>
    </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin_login.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
        <li><a href="sign_up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <?php if(isset($_SESSION['email']))
                  echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                  else
                    echo '<li><a href="sign_in.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>'
                  ?>
        
      </ul>
    </div>
  </div>
</nav>


<script>
function myFunction() {
   document.getElementById('asd').className = 'navbar navbar-default';
}
</script>