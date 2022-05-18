<?php
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
<link rel="stylesheet" href="button_like/style_button.css">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<?php
//Select database


$query = "SELECT text_post, userid_post FROM post ";/*where status = 1 and qid =".$id;*/
echo $query;
$result=dbquery($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
$num_rows = mysql_num_rows($result);
if($num_rows==0) {
 echo '<center><font color="red"><b>No post found!!</b></font></center>';
}
else {
$row = mysql_fetch_array($result);
echo $row['text_post'];
echo $row['userid_post'];
}


?>


<div class="heart-btn">
  <div class="content">
    <span class="heart"></span>
    <span class="text">Like</span>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('.content').click(function(){
      $('.content').toggleClass("heart-active")
      $('.text').toggleClass("heart-active")
      $('.heart').toggleClass("heart-active")
    });
  });
</script>

<style>
body{
  background-color:white !important;
}
</style>
<?php
    include_once 'footer.php';
?>