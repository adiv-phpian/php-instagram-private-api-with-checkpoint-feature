<?php

namespace Instagram\API\Request;

use Instagram\API\Response\LoginResponse;
use Instagram\Instagram;

class Challenge_sendcode_again extends SeparateRequest {


    /**
     * @param $instagram Instagram
     * @param $username string Instagram Username
     * @param $password string Instagram Password
     */
    public function __construct($instagram, $url, $replay){

        parent::__construct($instagram, $replay);

        foreach($instagram->getCookies() as $key => $value){
          $this->addCookie($key, $value);
        }

        $headers = array("x-instagram-ajax" => true,
                         "referer" => $url,
                         "x-csrftoken" => $instagram->getCookies()['csrftoken']);

        foreach($headers as $key => $value){
          $this->addHeader($key, $value);
        }

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
      return $this->challengeUrl;
    }

    public function getResponseObject(){
        return new LoginResponse();
    }

    public function throwExceptionIfResponseNotOk(){
        return true;
    }

    /**
     * @return LoginResponse
     */
    public function execute(){
        return parent::execute();
    }

}
