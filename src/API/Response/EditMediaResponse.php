<?php

namespace Instagram\API\Response;

class EditMediaResponse extends BaseResponse {

    /**
     * Media
     * @var Model\FeedItem
     */
    protected $media;

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