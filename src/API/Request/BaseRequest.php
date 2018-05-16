<?php

namespace Instagram\API\Request;

use Instagram\API\Constants;
use Instagram\API\Framework\InstagramException;
use Instagram\API\Framework\Request;
use Instagram\API\Framework\Response;
use Instagram\Instagram;

abstract class BaseRequest extends Request {

    /**
     * @var Instagram
     */
    public $instagram;

    /**
     * @var Response The Response Object
     */
    private $response;

    public $challengeUrl;

    /**
     * @param $instagram Instagram The Instagram instance to make the Request with.
     */
    public function __construct($instagram, $url = null){

        parent::__construct();

        $this->challengeUrl = $url;

        //$this->addHeader("Accept-Encoding", Constants::ACCEPT_ENCODING);
        $this->addHeader("Accept-Language", Constants::ACCEPT_LANGUAGE);

        $this->addHeader("X-IG-Capabilities", Constants::IG_CAPABILITIES);
        $this->addHeader("X-IG-Connection-Type", Constants::IG_CONNECTION_TYPE);

        $this->addHeader("User-Agent", Constants::USER_AGENT);

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
        if($this->challengeUrl != null) return $this->challengeUrl;
        return Constants::BASE_URL . $this->getEndpoint();
    }

    public function parseResponse(){
        return true;
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

        if($this->interceptResponse($response)){
            return null;
        }

        if($this->throwExceptionIfResponseNotOk() && !$response->isOK() && !$response->isJson()){
            throw new InstagramException(sprintf("Instagram Request Failed! [%s] [%s]", $this->getEndpoint(), $response->getCode()));
        }

        $this->instagram->setCookies(array_merge($this->instagram->getCookies(), $response->getCookies()));

        if($this->parseResponse()){
            return $this->mapper->map($response->getData(), $this->getResponseObject());
        }

        return $response->getData();

    }

}
