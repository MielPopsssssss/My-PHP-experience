<?php
    include_once 'header.php';
?>

<?php
    if (isset($_SESSION["userid"])){
      //echo "<p> Hello there " "</p>";
      //echo $_SESSION["useremail"];
      echo '<section class = "post-form">';
      echo '<form action="upload.php" method="POST" enctype = "multipart/form-data">';
      echo '<div class="box">';
      echo '<p><input class="inputbox" type = "text" name = "text" placeholder="Poster un nouveau tweet"';
      echo '<p><button class= "submitbox" type="submit" name="submit"> Poster le tweet</button></p>';
      echo "</div>";
      echo "</form>";
      echo "</section>";
  }
  else{
      echo "<a href='signup.php'>SIGNUP</a> OR <a href='login.php'>LOGIN</a> TO CREATE A POST !";
  }

?>

<?php
    include_once 'footer.php';
?>