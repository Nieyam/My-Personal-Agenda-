<?php 
    if (isset($_GET['page'])){
      $pages=array("agenda", "dashboard", "account", "logout");
		  if (in_array($_GET['page'], $pages)) {
			  $_page=$_GET['page'];
		  } else {
        $_page="agenda";
      }
    } else{
        $_page="agenda";
    }
    $vnaam = $_SESSION['vnaam'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>My P-A</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/header-footer.css?ts<?=time()?>">
    <link rel="stylesheet" href="css/style.css?ts<?=time()?>">
    <link rel="stylesheet" href="css/agenda.css?ts<?=time()?>">
    <link rel="stylesheet" href="css/dashboard.css?ts<?=time()?>">

  </head>
  <body>
    <header>

        <a class="navbar-brand" href="index.php?page=agenda">My P-A</a>

      <nav>
        <ul>
          <li>
            <a href="index.php?page=agenda">Agenda</a>
          </li>
          <li>
            <a href="index.php?page=dashboard">Dashboard</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropbtn">Account &#8595;</a>
            <div class="dropdown-content">
              <a href="index.php?page=account">Profile</a>
              <a href="index.php?page=logout">Log out</a>
            </div>
          </li>
        </ul>
      </nav>
  </header>


