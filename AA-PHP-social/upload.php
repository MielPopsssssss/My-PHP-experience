<?php
    include_once 'header.php';
?>
<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php'; 
    if (isset($_POST['submit'])) {
        if (($_POST['text'] != '')){
            $userid_post = $_SESSION["userid"];
            $text_post = $_POST['text'];
            $req = $conn->query("SELECT username FROM users WHERE userid=$userid_post");
            $data = $req->fetch_array();
            $username_post = $data['username'];
            clean($text_post);
            dbquery($conn,"INSERT INTO post (userid_post, text_post , username_post) VALUES ('$userid_post','$text_post','$username_post')");
        }
    }
    else{
        header("location: index.php?errorWhenPostCreated");
        exit();
    }
    
    header("location: index.php");
    exit();
?>

<?php
    include_once 'footer.php';
?>