<?php    include_once 'header.php';
?>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p> Fill all the fields please </p>";
        }
        else if ($_GET["error"] == "wronglogin"){
            echo "<p> User or password are wrong </p>";
        }
    }
    ?> 

    <section class = "signup-form">
    <h2> Login </h2>
    <form action="includes/login.inc.php" method="post" >
        <script src="https://use.fontawesome.com/3771157c6e.js"></script>
        <div class="field">
            <label class="label">Email or Username</label>
            <div class="control">
                <input class="input" type="text" name="username" placeholder="Email or Username ...">
            </div>
        </div>
        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input class="input" type="password" name="password" placeholder="Password ...">
            </div>
        </div>

            <button type="submit" name="submit" class="button is-primary">Login</button>  
    </form>
    </section>
    <style>
        .signup-form{
            text-align: center;
            margin-top:10%;
        }
    </style>
<?php
    include_once 'footer.php';
?>
