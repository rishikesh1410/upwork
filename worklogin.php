<?php
 session_start();
 $message = "";
 if(isset($_POST['submitbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'freelancer');
    $x = "SELECT * FROM users WHERE email = '$email' and pass='$password'";
    $res = mysqli_query($con,$x);
    $num = mysqli_num_rows($res);
    if($num>0) {
        $row = mysqli_fetch_array($res);
        $_SESSION['user'] = $row['firstname']." ".$row['middlename']." ".$row['lastname'];
        header('location:workhome.php');
    }else $message = "<div class='alert alert-secondary' role='alert'>Wrong Email or Password</div>";
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <?php include("includes/cssfiles.php"); ?>
</head>

<body>

  <!-- Start your project here-->
  <header>
    <?php include("includes/navbar.php"); ?>
  </header>
  <main>
  <br><br><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <!-- Default form login -->
          <form method="post" action="worklogin.php" class="text-center border border-light p-5" action="workhome.php">
          <?php echo $message;?>
              <p class="h4 mb-4">Sign in</p>

              <!-- Email -->
              <input name="email" type="email" id="email" class="form-control mb-4" placeholder="E-mail">

              <!-- Password -->
              <input name="password" type="password" id="pass" class="form-control mb-4" placeholder="Password">

              <div class="d-flex justify-content-around">
                  <div>
                      <!-- Remember me -->
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                          <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                      </div>
                  </div>
                  <div>
                      <!-- Forgot password -->
                      <a href="">Forgot password?</a>
                  </div>
              </div>

              <!-- Sign in button -->
              <button name="submitbtn" class="btn btn-block my-4 mybtn" type="submit">Sign in</button>

              <!-- Register -->
              <p>Not a member?
                  <a style="color:rgb(60,60,60)" href="irelogin.php">Create a Account</a>
              </p>

              <!-- Social login -->
              <p>or sign in with:</p>

              <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f myicon"></i></a>
              <a href="#" class="mx-2" role="button"><i class="fab fa-twitter myicon"></i></a>
              <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in  myicon"></i></a>
              <a href="#" class="mx-2" role="button"><i class="fab fa-github myicon"></i></a>

              </form>
      <!-- Default form login -->

        </div>
      </div>
    </div>
    <br><br>

    

  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
  <!-- /Start your project here-->

  
</body>
<?php include("includes/jsfiles.php"); ?>

</html>



