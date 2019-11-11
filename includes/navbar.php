<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar" style="background-color:rgb(60,60,60)">
  <a class="navbar-brand" href="#">UpWork</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false" style="color:white;">Features
        </a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Find a Job</a>
          <a class="dropdown-item" href="#">Hire a Talent</a>
          <a class="dropdown-item" href="#">Premium Subsciption</a>
        </div>
      </li>
    </ul>
    <?php if(isset($_SESSION['user'])) { ?>
      <a style="font-size:10px;" class="btn btn-outline-white btn-md" href="#">Welcome&nbsp;&nbsp;<?php echo $_SESSION['user'];?></a>
      <a style="font-size:10px;" class="btn btn-outline-white btn-md" href="logout.php">Logout</a>

    <?php }else { ?>
    <a style="font-size:10px;" class="btn btn-outline-white btn-md" href="hiresignup.php"><i class="fas fa-sign-in-alt fa-lg left"></i> Login</a>
    <?php } ?>
  </div>
</nav>

