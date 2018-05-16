<?php

namespace Instagram\API\Response;

class UserMapResponse extends BaseResponse {

    /**
     * Geo Media
     * @var Model\GeoMedia[]
     */
    protected $geo_media;

    /**
     * @return Model\GeoMedia[]
     */
    public function getGeoMedia()
    {
        return $this->geo_media;
    }

    /**
     * @param Model\GeoMedia[] $geo_media
     */
    public function setGeoMedia($geo_media)
    {
        $this->geo_media = $geo_media;
    }

}