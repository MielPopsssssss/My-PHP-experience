<?php
    include_once 'header.php';
?>
<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p> Fill all the fields please </p>";
        }
        else if ($_GET["error"] == "invalidusername"){
            echo "<p> Choose a valid username </p>";
        }
        else if ($_GET["error"] == "invalidemail"){
            echo "<p> Choose a valid email </p>";
        }
        else if ($_GET["error"] == "passwordarenotthesame"){
            echo "<p> Passwords should be the same !! </p>";
        }
        else if ($_GET["error"] == "usernameoremailtaken"){
            echo "<p> This email or username is already taken </p>";
        }
        else if ($_GET["error"] == "stmtfailed"){
            echo "<p> Something went wrong try again </p>";
        }
        else if ($_GET["error"] == "none"){
            echo "<p> You have signed up !! </p>";
        } 
        
    }
    ?>
    <section class = "signup-form">
        <h2> Sign Up </h2>
        <form action="includes/signup.inc.php" method="post">
        <div class="box">
            <p><input class="inputbox" type="text" name="nickname" placeholder="Full Name ..."></p>
            <p><input class="inputbox" type="email" name="email" placeholder="Email ..."></p>
            <p><input class="inputbox" type="text" name="username" placeholder="Username ..."></p>
            <p><input class="inputbox" type="password" name="password" placeholder="Password ..."></p>
            <p><input class="inputbox" type="password" name="passwordrepeat" placeholder="Repeat Password ..."></p>
            <p><button class="submitbox" type="submit" name="submit">Sign up</button></p>
        </div>
        </form>
    </section>
<style>

.signup-form{
    text-align: center;
    margin-top: 10%;
}
.text-center{
	color:#fff;	4

	text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;6
    display: block;
    text-align: center;
}
.box{
	position:absolute;
	left:50%;
	top:50%;
	transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
	border-radius:3px;
	padding:70px 100px;
}
.inputbox{
	position:relative;
	margin-bottom:25px;
}
.inputbox label{
	position:absolute;
	top:0px;
	left:0px;
	font-size:16px;
	color:#fff;	
    pointer-event:none;
	transition: all 0.5s ease-in-out;
}
.inputbox input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.inputbox input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #e74c3c;	
}
</style>

<?php
    include_once 'footer.php';
?>
