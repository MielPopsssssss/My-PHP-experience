<?php

function emptyinputsignup($nickname,$email,$username,$password,$passwordrepeat) {
    $result;
    if (empty($nickname)|| empty($email) || empty($username) || empty($password) || empty($passwordrepeat) ) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidusername($username) {
    $result;
    if (! preg_match("/^[a-zA-Z0-9]*$/", $username )) {
        $result = true;  
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidemail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordmatch($password,$passwordrepeat) {
    $result;
    if ($password !== $passwordrepeat ) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function usernameexist($conn,$username,$email) {
    $sql = "SELECT * FROM users WHERE username = ? OR useremail = ?; ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultdata = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultdata)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function deleteuser($conn,$userid)
{
    if (isset($_SESSION['userid'])){
        $idsuppr = $_SESSION['userid'];
        $sql = "DELETE FROM users WHERE userid=$idsuppr";
        if ($conn->query($sql) === TRUE) {
        echo "Account deleted successfully";
        } else {
        echo "Error deleting the account: " . $conn->error;
        }
        $conn->close();
        session_unset();
        session_destroy();
        header("location: ../index.php");
        exit();
    }
}

function dbquery($conn, $sql, $verbose = false)
{
    if ($verbose)
        echo $sql;
    return ($conn->query($sql));
}

function clean($input) {
    $search = array(
      '@<script[^>]*?>.*?</script>@si',
      '@<[\/\!]*?[^<>]*?>@si',      
      '@<style[^>]*?>.*?</style>@siU',   
      '@<![\s\S]*?--[ \t\n\r]*>@'        
    );

    $output = preg_replace($search, '', $input);
    return $output;
}

function createuser($conn,$nickname,$email,$username,$password) {

    foreach (get_defined_vars() as &$param)
        if ($param != $conn)   
            $param = $conn->real_escape_string($param);
    $password = password_hash($password, PASSWORD_DEFAULT);
    return (dbquery($conn, "
        INSERT INTO users
            (nickname, useremail, username, userpassword)
        VALUES (
            '$nickname',
            '$email',
            '$username',
            '$password'
        )  
    "));


    return ;
    $sql = "INSERT INTO users (nickname,useremail,username,userpassword) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
        //header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    else{
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);
        assert(mysqli_stmt_bind_param($stmt,"ssss",$nickname,$email,$username,$hashedpassword));
        assert(mysqli_stmt_execute($stmt)); 
        #mysqli_stmt_close($stmt);
        //header("location: ../signup.php?error=none");
        exit();
        }
    mysqli_stmt_close($stmt);

}

function emptyinputlogin($username,$password ) {
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginuser($conn,$email,$username,$password) {
    $usernameexist = usernameexist($conn,$username,$email);
    if ($usernameexist === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordhashed = $usernameexist["userpassword"];
    $chechkpassword = password_verify($password,$passwordhashed);

    if (checkpassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    if ($chechkpassword === true){
        session_start();
        $_SESSION["userid"] = $usernameexist ["username"];
        $_SESSION["userid"] = $usernameexist ["userid"];
        header("location: ../index.php");
        exit();
         
    }
}