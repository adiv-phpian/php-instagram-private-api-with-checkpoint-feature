<?php


namespace Instagram\API\Framework;

use Curl\Curl;

class Response {

    const OK = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;

    /**
     * @var Curl Curl Object
     */
    private $curl;

    /**
     * @var object Response Data;
     */
    private $data;

    /**
     * @param $curl Curl
     * @param $data
     */
    public function __construct($curl, $data){
        $this->curl = $curl;
        $this->data = $data;
    }

    /**
     *
     * Get Response Code
     *
     * @return int Response Code
     */
    public function getCode(){
        return $this->curl->httpStatusCode;
    }

    /**
     *
     * Get Response Data
     *
     * @return object Response Data
     */
    public function getData(){
        return $this->data;
    }

    /**
     *
     * Get Response Headers
     *
     * @return array Response Data
     */
    public function getHeaders(){

        $headers = $this->curl->responseHeaders;

        if($headers != null){
            return $headers;
        }

        return array();

    }

    /**
     *
     * Get Content Type
     *
     * @return string
     */
    public function getContentType(){
        $headers = $this->getHeaders();
        return $headers["content-type"];
    }

    /**
     *
     * Check if Content Type is Json
     *
     * @return bool
     */
    public function isJson(){
        return $this->getContentType() == "application/json";
    }

    /**
     *
     * Get Response Cookies
     *
     * @return array Response Data
     */
    public function getCookies(){

        $cookies = $this->curl->getResponseCookies();

        if($cookies != null){
            return $cookies;
        }

        return array();

    }

    public function getContentDispositionFilename(){

        $headers = $this->getHeaders();
        parse_str($headers["Content-Disposition"], $results);
        return $results["attachment;filename"];

    }

    /**
     *
     * Check if the Response was 200 OK
     *
     * @return bool
     */
    public function isOK(){
        return in_array($this->getCode(), array(self::OK, self::CREATED, self::ACCEPTED));
    }

}
