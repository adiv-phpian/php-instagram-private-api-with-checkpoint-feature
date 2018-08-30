<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include("../vendor/autoload.php");

    use \Instagram\Instagram;

    $url_redirect =  dirname($_SERVER['REQUEST_URI']);

    try{

      $instagram = new \Instagram\Instagram();
      //$instagram->setProxy("159.89.186.226:80");

      $method = json_decode($_POST['method_obj']);
      $session = $_POST['insta'];

      $instagram->initFromSavedSession($session);
      $response = $instagram->ConfirmVerificationCode($_POST['url'], $_POST['code']);

      if($response->status == "ok"){

        $user = json_decode($instagram->saveSession());
        $userId  = $user->cookies->ds_user_id;
        $user->loggedInUser['pk'] = $userId;

        include("user.php");
        exit();

      }else{
        $insta = $session;
        $url = $request->url;
        $response = json_decode($request->url_obj);
        $method = json_decode($request->method_obj);
        $pass = $request->pass;
        $error = "Check the verification code.";

        header("Location: ".$url_redirect."/login_form.php?error=".$error);
        exit();

      }

     }catch(\Exception $e){
         $error = json_encode($savedSession);
         header("Location: ".$url_redirect."/login_form.php?error=".$error);
         exit();
    }

?>
