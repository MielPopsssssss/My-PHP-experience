<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>

<?php
    if (isset($_SESSION['userid'])){
        $name = $_SESSION['userid'];
        $req = $conn->query("SELECT username FROM users WHERE userid=$name");
        $data = $req->fetch_array();
        $name = $data['username'];
        echo "<a>Hello $name here is the posts you've shared !</a>";
        $query = $conn->query('SELECT * FROM post');
        while($m = $query->fetch_array()){
            $useridtmp = $m['userid_post'];
            $username = $m['username_post'];
            $postid = $m['id_post'];
            if($useridtmp == $_SESSION['userid']){?>
                <div class="columns is-mobile is-centered">
                <div class="column is-half">
                    <div class="box">
                    <?php echo "<strong>Posté par : ".$username."</strong>";?>
                    <br><?php echo "<p class='bd-notification is-primary'>".$m['text_post']."</p>"; ?></br>
                    <button class="button is-info is-outlined">Like</button>
                <form action = "answer.php" method="POST" enctype = "multipart/form-data">
                    <input class="input is-primary" type="text" name="text" placeholder="Répondre"/>
                    <input type="hidden" name="postid" value="<?php echo htmlspecialchars($postid);?>"/>
                    <button class="button" type="submit" name="submit" >Envoyer</button>
                </form><!--je dois envoyer postid dans le form a answer.php-->
                <?php $querycomment = $conn->query("SELECT * FROM post_comment WHERE id_post='$postid'");
                    if ($querycomment){
                        while($comment = $querycomment->fetch_array()){
                        echo "<p><strong>".$comment['username_comment']." a répondu :</strong></p>";
                        echo $comment['comment_text'];
                        } 
                    }?>
<?php   } 
        } 
    }
    else
    {
        echo "Vous devez <a href='login.php'>vous connectez</a> pour acceder a votre profil !";
    }
    ?>
<?php
    include_once 'footer.php';
?>
