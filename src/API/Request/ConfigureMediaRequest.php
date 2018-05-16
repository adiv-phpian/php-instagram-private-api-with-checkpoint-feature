<?php

namespace Instagram\API\Request;

use Instagram\API\DeviceConstants;
use Instagram\API\Response\ConfigureMediaResponse;
use Instagram\Instagram;

class ConfigureMediaRequest extends AuthenticatedBaseRequest {

    const SOURCE_TYPE_CAMERA = "3";

    /**
     * @param $instagram Instagram
     * @param $uploadId string Upload Id
     * @param $path string File Path of the Photo that was Uploaded
     * @param $caption string Caption for this Photo
     */
    public function __construct($instagram, $uploadId, $path, $caption = null){

        parent::__construct($instagram);

        list($width, $height) = getimagesize($path);
        $caption = $caption != null ? $caption : "";

        $date = date("Y:m:d H:i:s");

        $this->setSignedBody(array(
            "camera_model" => DeviceConstants::CAMERA_MODEL,
            "_csrftoken" => $instagram->getCSRFToken(),
            "source_type" => self::SOURCE_TYPE_CAMERA,
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID(),
            "caption" => $caption,
            "date_time_original" => $date,
            "date_time_digitalized" => $date,
            "upload_id" => $uploadId,
            "camera_make" => DeviceConstants::CAMERA_MAKE,
            "device" => array(
                "manufacturer" => DeviceConstants::MANUFACTURER,
                "model" => DeviceConstants::MODEL,
                "android_version" => DeviceConstants::ANDROID_VERSION,
                "android_release" => DeviceConstants::ANDROID_RELEASE,
            ),
            "edits" => array(
                "crop_original_size" => array($width, $height),
                "crop_center" => array(0.0, -0.0),
                "crop_zoom" => 1.3333334
            ),
            "extra" => array(
                "source_width" => $width,
                "source_height" => $height
            ),
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/media/configure/";
    }

    public function getResponseObject(){
        return new ConfigureMediaResponse();
    }

    /**
     * @return ConfigureMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}