<?php

namespace Instagram\API\Request;

use Instagram\API\Framework\RequestFile;
use Instagram\API\Response\PhotoUploadResponse;
use Instagram\Instagram;

class PhotoUploadRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $path string File Path of the Photo to Upload
     */
    public function __construct($instagram, $path){

        parent::__construct($instagram);

        $uploadId = number_format(round(microtime(true) * 1000), 0, '', '');

        $this->addParam("_csrftoken", $instagram->getCSRFToken());
        $this->addParam("_uuid", $instagram->getUUID());
        $this->addParam("upload_id", $uploadId);

        $this->addParam("image_compression", json_encode(array(
            "lib_name" => "jt",
            "lib_version" => "1.3.0",
            "quality" => "70"
        )));

        $this->addFile("photo", new RequestFile($path, "application/octet-stream", sprintf("pending_media_%s.jpg", $uploadId)));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/upload/photo/";
    }

    public function getResponseObject(){
        return new PhotoUploadResponse();
    }

    /**
     * @return PhotoUploadResponse
     */
    public function execute(){
        return parent::execute();
    }

}