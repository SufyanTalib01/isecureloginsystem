<?php 

    require 'components/_db_connect.php';

    $accountCreated = false;
    $passwordNotSame = false;
    $usernameAlready = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];

      $sql = "SELECT * FROM `securesystemdata` WHERE `username` = '$username'";

      $result = mysqli_query($connection , $sql);
      $num = mysqli_num_rows($result);
      
      if($num >= 1){
        $usernameAlready = true;
      }
      else{
        if($password == $cpassword){
          $hash = password_hash($password , PASSWORD_DEFAULT);
          $sql = "INSERT INTO `securesystemdata` (`username`, `password`, `dt`) VALUES ('$username', '$hash', CURRENT_TIMESTAMP)";

          $result = mysqli_query($connection , $sql);
          if($result){
            $accountCreated = true;
          }
        }
        else{
          $passwordNotSame = true;
        }
      }
      
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    


    <title>signup</title>
  </head>
  <body>
    <?php require 'components/_nav.php'; ?>

    <?php

          if($accountCreated){
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Congratulations!</strong> Your account has been created. Please Log in
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          if($passwordNotSame){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Oppps!</strong>Password and Confirm Password is not same.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }
          if($usernameAlready){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Oppps!</strong> Username has Already please use unique username.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          }

    ?>

    <!-- SIGN UP FORM  -->
    <div class="container col-md-6 my-4">
        <h2 class="text-center">Please Sign up</h2>
        <form action="signup.php" method="POST">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter email">
                
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="cpassword">Confrim Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Password">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>