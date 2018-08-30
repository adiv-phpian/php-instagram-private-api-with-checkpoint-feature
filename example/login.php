<?php

   ini_set("display_errors", 1);
   error_reporting(E_ALL);

   include("../vendor/autoload.php");

   use \Instagram\Instagram;

   $url_redirect =  dirname($_SERVER['REQUEST_URI']);

   if(isset($_POST['username']) && isset($_POST['password'])){

   $instagram = new \Instagram\Instagram();
   //$instagram->setProxy("159.89.186.226:80");

   try{

         $response = $instagram->login($_POST['username'], $_POST['password']);

          if(!is_object($response) && isset($response['code']) && $response['code'] == 201){

            $url = $response['url'];

            $res = $instagram->ChallengeCode($response['url']);

            $pattern = '/window._sharedData = (.*);/';
            preg_match($pattern, $res, $matches);

            //$res = $instagram->GetChallengeMethods($response['url']);

            $json = json_decode($matches[1]);

            $method = $json->entry_data->Challenge[0]->extraData->content[3]->fields[0]->values[0];

            $response = $instagram->sendVerificationCode($response['url'], $method->value);

            $insta = $instagram->saveSession();

            include("verification_form.php");

            exit();

          }


          $user = $instagram->saveSession();

          include("user.php");
          exit();

   }catch(Exception $e){
     $error = $e->getMessage();
     header("Location: ".$url_redirect."/login_form.php?error=".$error);
     exit();
   }

   }else{
     header("Location: ".$url_redirect."/login_form.php?error=enter valid username and password");
     exit();
   }
