<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
<?php
if (isset($_SESSION['userid'])){?>
    <form method = "POST">
        <a>
            <button class='button is-danger' type='submit' name='delete'><strong>SUPPRIMER MON COMPTE</strong></button>
        </a>
    </div>
    </form>
    <?php
    if (isset($_POST["delete"])){
        deleteuser($conn,$_SESSION['userid']);
    }
    ?>
<?php } ?>
<?php if (!isset($_SESSION['userid'])){ ?>
    <p>You need to be connected to access your setings</p>
<?php } ?>
<style>
.buttons{
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10%;
}

</style>
<?php
    include_once 'footer.php';
?>