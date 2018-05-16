

<b> This is liam cottle library with instagram private api checkpoint issue solved. </b>

<b> Clone repo and run example folder on your browser. you can see how it's works. </b>

<b>Do not use this checkpoint feature for bulk like. There's a chance that you will get checkpoint again or you might need to verify profile once you reach limit.</b>

I created this solution for my own project. I post here for others to use it. Code is not clear and not meet code standard, so i didn't commit the changes to original library.

To login and send verification code

`
$response = $instagram->login($request->username, $request->password);

if(!is_object($response) && isset($response['code']) && $response['code'] == 201){
     $url = $response['url'];
     $res = $instagram->ChallengeCode($response['url']);
 
     $pattern = '/window._sharedData = (.*);/';
     preg_match($pattern, $res, $matches);             

     $json = json_decode($matches[1]);

     $method = $json->entry_data->Challenge[0]->extraData->content[3]->fields[0]->values[0];
     $response = $instagram->sendVerificationCode($response['url'], $method->value);

     $session = $instagram->saveSession();
     
}

`

<b> You need to store this $session response for next request, where you are going to send verfication code to API. <b>
  
You have to save $session from above step and use it in below code.
  
<b>Here's code to send verification code</b>



`
$instagram = new \Instagram\Instagram();
$method = json_decode($request->method_obj);
$instagram->initFromSavedSession($session);
$response = $instagram->ConfirmVerificationCode($request->url, $request->code);

if($response->status == "ok"){
    $savedSession = json_decode($instagram->saveSession());
    $userId  = $savedSession->cookies->ds_user_id;
    $savedSession->loggedInUser['pk'] = $userId;
    
    $instagram->initFromSavedSession(json_encode($savedSession));
    $userInfo = $instagram->getUserInfo($userId);
    print_R($userInfo);die;

}else{       
    //$error = "Check the verification code.";
    print_R($response);die;
}

`
Great coding!

If you have any problem raise an issue.
