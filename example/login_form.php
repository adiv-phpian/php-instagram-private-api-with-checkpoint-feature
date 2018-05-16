<?php

function reconstruct_url($url){
    $url_parts = parse_url($url);
    return dirname($url_parts['path']);
}

$url =  reconstruct_url($_SERVER['REQUEST_URI']);

?>

<!DOCTYPE html>
<html>
<body>

<h2>Test your username and password.</h2>

<h3 style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></h3>


<form action="<?=$url?>/login.php" method="post">
  Username or Email:<br>
  <input type="text" name="username" >
  <br>
  Password:<br>
  <input type="text" name="password" >
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
