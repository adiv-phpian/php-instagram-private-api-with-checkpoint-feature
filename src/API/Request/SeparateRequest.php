<?php

namespace Instagram\API\Request;

use Instagram\API\Constants;
use Instagram\API\Framework\InstagramException;
use Instagram\API\Framework\Request;
use Instagram\API\Framework\Response;
use Instagram\Instagram;

abstract class SeparateRequest extends Request {

    /**
     * @var Instagram
     */
    public $instagram;

    /**
     * @var Response The Response Object
     */
    public $response;

    public $challengeUrl;

    /**
     * @param $instagram Instagram The Instagram instance to make the Request with.
     */
    public function __construct($instagram, $url = null){

        parent::__construct();

        $this->challengeUrl = $url;

        //dd(Constants::ACCEPT_LANGUAGE);

        $this->addHeader("Accept-Language", Constants::ACCEPT_LANGUAGE);

        $this->addHeader("X-IG-Capabilities", Constants::IG_CAPABILITIES);
        $this->addHeader("X-IG-Connection-Type", Constants::IG_CONNECTION_TYPE);

        $this->addHeader("User-Agent", Constants::USER_AGENT);

        //$this->addHeader("User-Agent", 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36');

        $this->setInstagram($instagram);
        $this->setProxy($instagram->getProxy());
        $this->setProxyCredentials($instagram->getProxyCredentials());
        $this->setVerifyPeer($instagram->shouldVerifyPeer());

    }

    /**
     * @param $instagram Instagram Instagram Instance to use for this Request
     */
    public function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    /**
     * @param $params array Parameters to add to Signed Body
     */
    public function setSignedBody($params){

        $json = json_encode($params);
        $signature = hash_hmac("sha256", $json, Constants::IG_SIGNATURE_KEY);

        $this->addParam("signed_body", sprintf("%s.%s", $signature, $json));
        $this->addParam("ig_sig_key_version", Constants::IG_SIGNATURE_KEY_VERSION);

    }

    /**
     * @return string The API Endpoint
     */
    public abstract function getEndpoint();

    /**
     * @return object The class instance to map the JSON to.
     */
    public abstract function getResponseObject();

    public function getUrl(){
        return $this->challengeUrl;
    }

    public function parseResponse(){
        return false;
    }

    /**
     * This method will be called before checking the Response is OK.
     * @param $response Response
     * @return bool If the Response was intercepted, and should stop being processed.
     */
    public function interceptResponse($response){
        return false;
    }

    public function getCachedResponse(){
        return $this->response;
    }

    public function throwExceptionIfResponseNotOk(){
        return true;
    }

    /**
     *
     * Execute the Request
     *
     * @return object Response Data
     * @throws InstagramException
     */
    public function execute(){

        $response = parent::execute();
        $this->response = $response;

        $this->instagram->setCookies(array_merge($this->instagram->getCookies(), $response->getCookies()));

        return $response->getData();

        if($response->isOK() && $response->isJson()){
          if($this->parseResponse()){
              return $this->mapper->map($response->getData(), $this->getResponseObject());
          }
        }else{
          return $response->getData();
        }

        //dd($this->instagram->getCookies());

    }

}
