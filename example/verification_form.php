<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

include("../vendor/autoload.php");

use \Instagram\Instagram;

$url_redirect =  dirname($_SERVER['REQUEST_URI']);

?>



<!DOCTYPE html>
<html>
<body>

<h2>verification code sent to <?php echo $method->label; ?> check and enter the verification code.</h2>

<h3 style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></h3>

<form action="<?=$url_redirect?>/verification.php" method="post">
  <input type="hidden" name="method_obj" value='<?php echo json_encode($method); ?>'>
  <input type="hidden" name="insta" value='<?php echo $insta; ?>'>
  <input type="hidden" name="method" value='<?php echo $method->value; ?>'>
  <input type="hidden" name="url" value='<?php echo $url; ?>'>
  <input type="hidden" name="url_obj" value='<?php json_encode($response); ?>'>
  <input type="text" name="code" class="form-control" id="code" required >
  <input type="submit" value="Submit">
</form>


<h4>Refresh page if you don't get code.</h4>

</body>
</html>
