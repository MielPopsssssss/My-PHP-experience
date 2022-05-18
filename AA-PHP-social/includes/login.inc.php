  <?php
  if(isset($_POST["submit"])){
    print_r($_POST);
    $username = $_POST["username"];
    $password = $_POST["password"];
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
    if (($username == clean($username)) and ($password == clean($password))){
      if (emptyinputlogin($username,$password) !== false){
          header("location: ../login.php?error=emptyinput");
          exit();
      }
      loginuser($conn,$email,$username,$password);
    }
    else{
      header("location: ../login.php?errorInTheInput");
      exit();
    }

  }
  else{
    header("location: ../login.php");
    exit();
  }

