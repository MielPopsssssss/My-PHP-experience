<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>

<?php
    if (isset($_SESSION['userid'])){
        $name = $_SESSION['userid'];
        echo "<a>Hello $name !</a>";
    }
    ?>
<?php
    include_once 'footer.php';
?>
