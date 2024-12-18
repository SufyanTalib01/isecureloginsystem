
<?php 

  $login = false;
  $logout = false;
  if(isset($_SESSION['loggedIn'])){
    $login = true;
  }
  else{
    $logout = true;
  }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <?php
    echo '<ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';

      if($logout){
        echo '<li class="nav-item">
        <a class="nav-link" href="/signup.php">Signup</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/login.php">Login</a>
        </li>';
      }
      
      if($login){
        echo '<li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
        </li>';
      }
      
    echo '</ul>'
    ?>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>