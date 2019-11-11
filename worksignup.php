<?php
  session_start();
  $message = "";
  if(isset($_POST['submitbtn'])) {
      $email = $_POST['email'];
      $fname = $_POST['fname'];
      $mname = $_POST['mname'];
      $lname = $_POST['lname'];
      $mobile = $_POST['mobile'];
      $address = $_POST['address'];
      $pincode = $_POST['pincode'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $password = $_POST['password'];
      $confpass = $_POST['confpass'];
      if(strlen($password)<9) $message = "<div class='alert alert-secondary' role='alert'>Password must be of atleast 8 characters</div>";
      else if($password == $confpass) {
          $con = mysqli_connect('localhost', 'root', '');
          mysqli_select_db($con, 'freelancer');
          $x = "SELECT * FROM users WHERE email = '$email' and pass='$password'";
          $res = mysqli_query($con,$x);
          if($res) {
              $y = "INSERT INTO users (firstname,middlename,lastname,email,mobile,gender,dob,pincode,address,pass) VALUES ('$fname','$mname','$lname','$email','$mobile','$gender','$dob',$pincode,'$address','$password')";
              $res = mysqli_query($con,$y);
              echo $y;
              $_SESSION['user'] = $fname." ".$mname." ".$lname;
              header('location:workhome.php');
          }else $message = "<div class='alert alert-secondary' role='alert'>User already exists</div>";
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
        <div class="col-md-8 offset-md-2">
          <!-- Default form login -->
          <form method="post" action="worksignup.php" class="text-center border border-light p-5" action="#!">
          <?php echo $message;?>
              <p class="h4 mb-4">Create a Account</p>
              <hr>

              <!-- Email -->
              <p class="h5 mb-4">Personal Details</p>
              <div class="row">
                <div class="col-md-4">
                    <input name="fname" type="text" id="fname" class="form-control mb-4" placeholder="First Name">
                </div>
                <div class="col-md-4">
                    <input name="mname" type="text" id="mname" class="form-control mb-4" placeholder="Middle Name">
                </div>
                <div class="col-md-4">
                    <input name="lname" type="text" id="lname" class="form-control mb-4" placeholder="Last Name">
                </div>
              </div>
              <div class="row">
                <div class="col-md-7">
                    <input name="email" type="email" id="email" class="form-control mb-4" placeholder="E-mail">
                </div>
                <div class="col-md-5">
                    <input name="mobile" type="tel" id="email" class="form-control mb-4" placeholder="Contact no">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <input name="gender" type="text" id="email" class="form-control mb-4" placeholder="Gender - M / F">
                </div>
                <div class="col-md-6">
                    <div class="row">
                    <div class="col-md-6">Date of Birth</div>
                    <input name="dob" type="date" id="email" class="form-control mb-4 col-md-6" placeholder="Date of Birth">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <input name="pincode" type="tel" id="email" class="form-control mb-4" placeholder="Pincode">
                </div>
                <div class="col-md-8">
                    <input name="address" type="text" id="email" class="form-control mb-4" placeholder="Address">
                </div>
              </div>
              <hr>


              <p class="h5 mb-4">Work Experience</p>
              <div class="row">
                <div class="col-md-4">
                    <input type="text" id="lcomp" class="form-control mb-4" placeholder="Last Company">
                </div>
                <div class="col-md-4">
                    <div class="row">
                    <div class="col-md-4">From</div>
                    <input type="date" id="email" class="form-control mb-4 col-md-8" placeholder="Date of Birth">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                    <div class="col-md-4">To</div>
                    <input type="date" id="email" class="form-control mb-4 col-md-8" placeholder="Date of Birth">
                    </div>
                </div>
              </div>
              <input type="text" id="email" class="form-control mb-4" placeholder="Description">
              <button class="btn btn-outline btn-md text-dark" href="worksignup.php"><i class="fas fa-clone left"></i> Add row</button>
              <hr>


              <p class="h5 mb-4">Skills</p>
              <div class="row">
                <div class="col-md-4">
                    <input type="text" id="email" class="form-control mb-4" placeholder="Skill - 1">
                </div>
                <div class="col-md-4">
                    <input type="text" id="email" class="form-control mb-4" placeholder="Skill - 2">
                </div>
                <div class="col-md-4">
                    <input type="text" id="email" class="form-control mb-4" placeholder="Skill - 3">
                </div>
              </div>
              <hr>
              


              <!-- Password -->
              <p class="h5 mb-4">Create a Password</p>
              <div class="row">
                <div class="col-md-6">
                    <input name="password" type="password" id="pass" class="form-control mb-4" placeholder="Password">
                </div>
                <div class="col-md-6">
                    <input name="confpass" type="password" id="confpass" class="form-control mb-4" placeholder="Confirm Password">
                </div>
              </div>

              <!-- Sign in button -->
              <button name="submitbtn" class="btn btn-block my-4 mybtn" type="submit">Sign up</button>

              <!-- Register -->
              <p>Already a member?
                  <a style="color:rgb(60,60,60)" href="worklogin.php">Login</a>
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



