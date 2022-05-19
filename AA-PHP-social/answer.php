<?php
    include_once 'header.php';
?>
<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php'; 
    if (isset($_POST['submit'])) {
        if(($_POST['text'] != '')){
            $username_comment = $_SESSION["userid"]; //pour l instant est en id pas en username 
            $comment_text = $_POST['text'];  
            //echo $comment_text."       ";// 100%
            $req = $conn->query("SELECT username FROM users WHERE userid = '$username_comment'");
            $data = $req->fetch_array();
            $username_comment = $data['username'];
            //echo $username_comment."     ";//100%

            // on charche mtn l id du post pour afficher le comment en dessous du bon id post
            
            $id_post = $_POST['postid'];
            //echo $id_post;// 100%
            clean($comment_text);
            dbquery($conn,"INSERT INTO post_comment (comment_text,username_comment,id_post) VALUES ('$comment_text','$username_comment','$id_post')");
            //echo "DONE";
        }
    }
    else{
        header("location: index.php?errorWhenAnswerCreated");
        exit();
    }
    
    header("location: index.php");
    exit();
?>

<?php
    include_once 'footer.php';
?>