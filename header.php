<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <img src="../images/orphic.jpg" class="logo" />
  <div class="header">
    <h1><i> where skin glows, energy flows &#9825;</i></h1>
  </div>

  <div class="navbar">
    <a href="index.php"> Home </a>
    <a href="products.php"> Products </a>
    <a href="newArrivals.php"> New Arrivals </a>

    <?php

    session_start();

    if (isset($_SESSION['name'])) {
      echo '<div class="right">';
      echo '<a href="about.php"> About us </a>';
      echo '<a href="contact.php"> Contact Us </a>';
      echo '<a href="../loginHandler/logout.php"> Logout </a>';
      echo '</div>';

      if ($_SESSION['role'] == 'admin') {
        echo '<a href="dashboard.php" style="background-color: blue;">Dashboard </a>';
      }
    } else {
      echo '<div class="right">';
      echo '<a href="about.php"> About us </a>';
      echo '<a href="contact.php"> Contact Us </a>';
      echo '<a href="register.php"> Register </a>';
      echo '</div>';
    }
    ?>

  </div>