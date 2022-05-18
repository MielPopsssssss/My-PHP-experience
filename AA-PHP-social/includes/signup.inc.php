<?php
if(isset($_POST["submit"])){
    echo $_POST["nickname"];
    $nickname = $_POST["nickname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if (($username == clean($username)) and ($password == clean($password)) and ($passwordrepeat == clean($passwordrepeat)) and ($nickname == clean($nickname)) and ($email == clean($email))){
        if (emptyInputSignup($nickname,$email,$username,$password,$passwordrepeat) !== false)
            header("location: ../signup.php?error=emptyinput");
        else if (invalidusername($username) !== false)
            header("location: ../signup.php?error=invalidusername");
        else if (invalidemail($email) !== false)
            header("location: ../signup.php?error=invalidemail");
        else if (passwordmatch($password,$passwordrepeat) !== false)
            header("location: ../signup.php?error=passwordarenotthesame");
        else if (usernameexist($conn,$username,$email) !== false)
            header("location: ../signup.php?error=usernameoremailtaken");
        else if (createuser($conn, $nickname, $email, $username, $password) !==false)
            header("location: ../login.php?error=none");
        else
            header("location: ../signup.php?error=unkwown");
        exit();
    }
    else {
        header("location: ../index.php?errorInTheInput");
        exit();
    }
}