<?php

namespace Instagram\API\Request;

use Instagram\API\Response\LoginResponse;
use Instagram\Instagram;

class SaveSession extends BaseRequest {

  public $url;

    /**
     * @param $instagram Instagram
     * @param $username string Instagram Username
     * @param $password string Instagram Password
     */
    public function __construct($instagram, $url){

        parent::__construct($instagram);

        foreach($instagram->getCookies() as $key => $value){
          $this->addCookie($key, $value);
        }

        $headers = array("x-instagram-ajax" => true,
                         "referer" => $url,
                         "x-csrftoken" => $instagram->getCookies()['csrftoken']);

        foreach($headers as $key => $value){
          $this->addHeader($key, $value);
        }


        $this->url = $url;

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "";
    }

    public function getResponseObject(){
        return new LoginResponse();
    }

    public function throwExceptionIfResponseNotOk(){
        return false;
    }

    /**
     * @return LoginResponse
     */
    public function execute(){
        return parent::execute();
    }

}
