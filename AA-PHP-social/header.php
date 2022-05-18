<?php 
    session_start();
?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8" />
        <title>AA Network</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    </head>
    <nav class="navbar">
        <style>
            .navbar {
                background-color: rgb(94,90,90);
            }
        </style>
    <div class="navbar-brand">
      <a class="navbar-item" href="index.php">
        <img src="images/logo.png">
      </a>
      <div class="navbar-burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  
    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="createpost.php">
            Create a post
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            <img src="images/profil.png">
          </a>

          <div class="navbar-dropdown">
            <a class="navbar-item" href="profil.php">
              Profil
            </a>

            <a class="navbar-item" href="settings.php">
              Paramètres
            </a>

            <hr class="navbar-divider">
            <a class="navbar-item" href="help.php">
                Aide
            </a>
          </div>
        </div>
        <?php if (isset($_SESSION["userid"])) { ?>
            <div class='navbar-item'>
            <div class='buttons'>
            <a class='button is-danger' href='includes/logout.inc.php'>
                <strong>Log out</strong>
            </a>
        <?php } else { ?>
            <div class='navbar-item'>
            <div class='buttons'>
            <a class='button is-danger' href='signup.php'>
              <strong>Sign up</strong>
            </a>
            <a class='button is-light' href='login.php'>
                Log in
            </a>
        
        <?php } ?>
        </div>
      </div>
    </div>
  </nav>
  <body>