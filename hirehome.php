<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header('location:index.php');
    }
    $message="";
    if(isset($_POST['submitbtn'])) {
        $name = $_SESSION['user'];
        $jobcat = $_POST['jobcat'];
        $jobtitle = $_POST['jobtitle'];
        $duration = $_POST['duration'];
        $description = $_POST['description'];
        $budget = $_POST['budget'];
        $paymentrate = $_POST['paymentrate'];
        $location = $_POST['joblocation'];
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'freelancer');
        $y = "INSERT INTO posting (jobcat,jobtitle,duration,description,budget,paymentrate,joblocation,companyname) VALUES ('$jobcat','$jobtitle',$duration,'$description',$budget,$paymentrate,'$location','$name')";
        $res = mysqli_query($con,$y);
        $message = "<div class='alert alert-secondary' role='alert'>Concerned users will be notified.</div>";
    }


    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'freelancer');
    $y = "SELECT * FROM users";
    $res = mysqli_query($con,$y);
    $num = mysqli_num_rows($res);
    $i=1;

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
<!-- Modal -->
  <!-- Start your project here-->
  <header>
  <?php include("includes/navbar.php"); ?>
  </header>
  <main><br><br><br>

    <ul class="nav nav-tabs ml-5 mt-5" id="myTab" role="tablist">
        <li class="nav-item myli">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Post a Job</a>
        </li>
        <li class="nav-item myli">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
            aria-selected="false">Find a Talent</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="card tab-pane fade show active ml-3 mr-2 mb-2" id="home" role="tabpanel" aria-labelledby="home-tab">
        <form method="POST" action="hirehome.php" class="text-center border border-light p-5">
        <?php echo $message;?>
            <p class="h4 mb-4">Post a Job</p>
            <hr>

            <!-- Email -->
            <div class="row">
                <div class="col-md-4">
                    <input name="jobcat" type="text" id="fname" class="form-control mb-4" placeholder="Job Category">
                </div>
                <div class="col-md-4">
                    <input name="jobtitle" type="text" id="mname" class="form-control mb-4" placeholder="Title">
                </div>
                <div class="col-md-4">
                <select name="duration" class="browser-default custom-select">
                    <option selected>Project duration</option>
                    <option value="1">One Month</option>
                    <option value="2">Two Months</option>
                    <option value="3">Three Months</option>
                </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="description" type="desc" id="email" class="form-control mb-4" placeholder="Description"></textarea>
                </div>
            </div>

            <div class="row">
                <?php for($i=1;$i<=6;$i++) { ?>
                    <div class="col-md-2">
                        <input type="text" id="skill<?php echo $i; ?>" class="form-control mb-4" placeholder="Skill - <?php echo $i; ?>">
                    </div>
                <?php } ?>
            </div>

            <!-- Email -->
            <div class="row">
                <div class="col-md-4">
                    <input name="budget" type="text" id="fname" class="form-control mb-4" placeholder="Budget in Rs">
                </div>
                <div class="col-md-4">
                    <select name="paymentrate" class="browser-default custom-select">
                        <option selected>Payment rate</option>
                        <option value="10000">10,000 / month</option>
                        <option value="20000">20,000 / month</option>
                        <option value="30000">30,000 / month</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="joblocation" class="browser-default custom-select">
                        <option selected>Job location</option>
                        <option value="Mumbai">Mumbai</option>
                        <option value="Bangalore">Bangalore</option>
                        <option value="Hyderabad">Hyderabad</option>
                    </select>
                </div>
            </div>
            <hr>

            <input type="text" id="fname" class="form-control mb-4" placeholder="Any other requirements">


            <!-- Sign in button -->
            <button name="submitbtn" class="btn btn-block col-md-2 mybtn" type="submit">Post</button>
            </form>
            <!-- Default form login -->
        </div>
        <div class="card tab-pane fade ml-3 mr-2 mb-2 pl-5 pr-5 pt-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <p class="h4 mb-4 text-center">Find a Talent</p>
            <hr>    
        <div class="row mt-3">
                <div class="col-md-3">
                    <select class="browser-default custom-select">
                        <option selected>Category</option>
                        <option value="1">Mumbai</option>
                        <option value="2">Bangalore</option>
                        <option value="3">Hyderabad</option>
                    </select>
                    <br><br>
                    <select class="browser-default custom-select">
                        <option selected>Sub category</option>
                        <option value="1">Mumbai</option>
                        <option value="2">Bangalore</option>
                        <option value="3">Hyderabad</option>
                    </select>
                    <br><br>
                    <button class="btn btn-outline btn-md mybtn" href="worksignup.php"><i class="fas fa-clone left"></i> Reset</button>


                </div>
                <div class="col-md-9">
                <?php 
                $i=1;
                while($row = mysqli_fetch_array($res)) { ?>
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <h5 class="card-title"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></h5>
                                    <p class="card-text"><?php echo $row['email'];?></p>
                                    </div>
                                    <div class="col-md-3 offset-md-3">
                                    <h5 class="card-text">Rating</h5>
                                    <span id="rateMe1<?php echo $i;?>"></span>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                    <span class="card-title">Skills &nbsp; : &nbsp;</span>
                                    <span class="card-text"></span>
                                    </div>
                                    <div class="col-md-3 offset-md-3">
                                    <a href="details.php" name="submitbtn" class="btn btn-block mybtn" type="submit">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php 
                    $i++;
                     } ?>
                </div>
            </div>
        </div>


  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>
  <!-- /Start your project here-->

  
</body>
<?php include("includes/jsfiles.php"); ?>
<script>
$(document).ready(function() {
  $('#rateMe11').mdbRate();
  $('#rateMe12').mdbRate();
  $('#rateMe13').mdbRate();
  $('#rateMe14').mdbRate();
  $('#rateMe15').mdbRate();
});
</script>

</html>