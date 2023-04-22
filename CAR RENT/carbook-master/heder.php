<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav" class="dropdown-menu"aria-labelledby="navbarDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="car2" class="nav-link">Cars</a></li>

          <li class="nav-item"><a href="about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="pricing" class="nav-link">Pricing</a></li>
          <li class="nav-item"><a href="car" class="nav-link">Cars</a></li>
          <li class="nav-item"><a href="blog" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
          
      
        
        </li>
        
       
          <?php
          if(isset ($_SESSION['user_id']))
          {
            ?>
          <li class="nav-item"><a href="profile" class="nav-link"><?php echo $_SESSION['user_id']?></a></li>
          <li class="nav-item"><a href="logout" class="nav-link">Logout</a></li>
         


        </ul> 







      </div>
      <?php 
      }
      else
      {
        ?>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="sign" class="nav-link">sign</a></li>
            <li class="nav-item"><a href="login" class="nav-link">login</a></li>
            <!-- <li class="nav-item"><a href="profile"class="nav-link">profile</a></li> -->
      </div>
      <?php
      }
      ?>
      		<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="booking1">booking</a></li>
    <li><a href="addcaradv">caradv</a></li>
    <li><a href="#">JavaScript</a></li>
  </ul>
</div>



      <!-- </ul> -->
    </div>
    <!-- </div> -->
  </nav>
  <!-- END nav -->