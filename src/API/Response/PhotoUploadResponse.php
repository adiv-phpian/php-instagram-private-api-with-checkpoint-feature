<?php

namespace Instagram\API\Response;

class PhotoUploadResponse extends BaseResponse {

    /**
     * Upload Id
     * @var string
     */
    protected $upload_id;

    /**
     * @return string
     */
    public function getUploadId()
    {
        return $this->upload_id;
    }

    /**
     * @param string $upload_id
     */
    public function setUploadId($upload_id)
    {
        $this->upload_id = $upload_id;
    }

}