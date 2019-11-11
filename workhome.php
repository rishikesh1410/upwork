<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header('location:index.php');
    }
    $message = "";
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'freelancer');
    $y = "SELECT * FROM posting";
    $res = mysqli_query($con,$y);
    $num = mysqli_num_rows($res);
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
<div class="modal fade" id="applymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Your Application has been submitted
      </div>
      <div class="modal-footer">
        <button type="button" class="btn mybtn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

  <!-- Start your project here-->
  <header>
    <?php include("includes/navbar.php"); ?>
  </header>
  <main><br><br><br>

    <ul class="nav nav-tabs ml-5 mt-5" id="myTab" role="tablist">
        <li class="nav-item myli">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
            aria-selected="true">Find a Job</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="card tab-pane fade show active ml-3 mr-2 mb-2 pt-5 pl-5 pr-5" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                    <select class="browser-default custom-select">
                        <option selected>Location</option>
                        <option value="1">Mumbai</option>
                        <option value="2">Bangalore</option>
                        <option value="3">Hyderabad</option>
                    </select>
                    <br><br>
                    <button class="btn btn-outline btn-md mybtn" href="worksignup.php"><i class="fas fa-clone left"></i> Reset</button>


                </div>
                <div class="col-md-9">
                    <?php while($row = mysqli_fetch_array($res)) { ?>
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <h5 class="card-title"><?php echo $row['jobtitle']; ?></h5>
                                    <p class="card-text"><?php echo $row['jobcat'];?></p>
                                    </div>
                                    <div class="col-md-3 offset-md-1">
                                    Skills
                                    </div>
                                    <div class="col-md-2">
                                    <?php echo "Rs ". $row['paymentrate'];?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                    <span class="card-title">Location &nbsp; : &nbsp;</span>
                                    <span class="card-text"><?php echo $row['joblocation'];?></span>
                                    </div>
                                    <div class="col-md-3 offset-md-3">
                                    <a href="#" type="button" data-toggle="modal" data-target="#applymodal" class="btn btn-block mybtn">Apply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card tab-pane fade ml-3 mr-2 mb-2 pl-5 pt-5 pr-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title">Panel title</h5>
                            <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                            <a class="card-link">Card link</a>
                            <a class="card-link">Another link</a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title">Panel title</h5>
                            <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                            <a class="card-link">Card link</a>
                            <a class="card-link">Another link</a>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title">Panel title</h5>
                            <p class="card-text">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
                            <a class="card-link">Card link</a>
                            <a class="card-link">Another link</a>
                        </div>
                    </div>
                    <hr>
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

</html>