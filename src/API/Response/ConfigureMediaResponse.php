<?php

namespace Instagram\API\Response;

class ConfigureMediaResponse extends BaseResponse {

    /**
     * Upload Id
     * @var int
     */
    protected $upload_id;

    /**
     * Media
     * @var Model\FeedItem
     */
    protected $media;

    /**
     * @return int
     */
    public function getUploadId()
    {
        return $this->upload_id;
    }

    /**
     * @param int $upload_id
     */
    public function setUploadId($upload_id)
    {
        $this->upload_id = $upload_id;
    }

    /**
     * @return Model\FeedItem
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param Model\FeedItem $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

}