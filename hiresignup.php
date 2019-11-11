<?php
  session_start();
  $message = "";
  if(isset($_POST['submitbtn'])) {
      $email = $_POST['email'];
      $name = $_POST['name'];
      $address = $_POST['address'];
      $pincode = $_POST['pincode'];
      $state = $_POST['state'];
      $city = $_POST['city'];
      $password = $_POST['password'];
      $confpass = $_POST['confpass'];
      if(strlen($password)<9) $message = "<div class='alert alert-secondary' role='alert'>Password must be of atleast 8 characters</div>";
      else if($password == $confpass) {
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'freelancer');
        $x = "SELECT * FROM company WHERE email = '$email' and pass='$password'";
        $res = mysqli_query($con,$x);
        if($res) {
            $y = "INSERT INTO company (email,companyname,companyaddress,pincode,companystate,city,pass) VALUES ('$email','$name','$address',$pincode,'$state','$city','$password')";
            $res = mysqli_query($con,$y);
            $_SESSION['user'] = $name;
            header('location:hirehome.php');
        }else $message = "<div class='alert alert-secondary' role='alert'>User already exits</div>";
      }else $message = "<div class='alert alert-secondary' role='alert'>Passwords doesn't match</div>";
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
          <form method="POST" class="text-center border border-light p-5" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <?php echo $message;?>
              <p class="h4 mb-4">Create a Account</p>

              <!-- Email -->
              <input name="email" type="email" id="email" class="form-control mb-4" placeholder="E-mail">

              <input name="name" type="text" id="compname" class="form-control mb-4" placeholder="Company Name">

              <input name="address" type="text" id="addr" class="form-control mb-4" placeholder="Company Address">

              <input name="pincode" type="tel" id="pincode" class="form-control mb-4" placeholder="Pincode">


              <div class="row">
                <div class="col-md-6">
                  <input name="state" type="text" id="state" class="form-control mb-4" placeholder="State">
                </div>
                <div class="col-md-6">
                  <input name="city" type="text" id="city" class="form-control mb-4" placeholder="City">
                </div>
              </div>

              <!-- Password -->
              <input name="password" type="password" id="pass" class="form-control mb-4" placeholder="Password">

              <input name="confpass" type="password" id="confpass" class="form-control mb-4" placeholder="Re-Enter Password">
              <div class="d-flex justify-content-around">
                  <div>
                      <!-- Remember me -->
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                          <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                      </div>
                  </div>
              </div>

              <!-- Sign in button -->
              <button name="submitbtn" class="btn btn-block my-4 mybtn" type="submit">Sign up</button>

              <!-- Register -->
              <p>Already a member?
                  <a style="color:rgb(60,60,60)" href="hirelogin.php">Login</a>
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



