<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>

<form method = "POST">
<div class='buttons'>
    <a class='button is-danger'>
        <button type='submit' name='delete'><strong>SUPPRIMER MON COMPTE</strong></button>
    </a>
</div>
</form>
<?php
if (isset($_POST["delete"])){
    echo "caca";
    deleteuser($conn,$_SESSION['userid']);
}
?>
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