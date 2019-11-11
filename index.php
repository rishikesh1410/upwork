<?php
session_start();
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
  <br><br>
    <div class="card-image">
      <div class="text-dark text-center py-5 px-4">
        <div>
          <h2 class="card-title h1-responsive pt-3 mb-3 font-bold"><strong>Hire expert freelancers for any job, online</strong></h2>
          <p class="mx-5 mb-5">Millions of small businesses use Freelancer to turn their ideas into reality. </p>
          <div>
            <a style="font-size:14px;" class="btn btn-outline-dark btn-md" href="hiresignup.php"><i class="fas fa-clone left"></i> I want to hire</a>
            <a style="font-size:14px;" class="btn btn-outline-dark btn-md" href="worksignup.php"><i class="fas fa-clone left"></i> I want to work</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <?php include("includes/footer.php"); ?>
  </footer>

  
</body>
<?php include("includes/jsfiles.php"); ?>

</html>