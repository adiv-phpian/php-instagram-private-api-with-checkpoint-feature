<?php

namespace Instagram\API\Response\Model;

class GeoMedia extends Model {

    /**
     * Media Id
     * @var string
     */
    protected $media_id;

    /**
     * Display Url
     * @var string
     */
    protected $display_url;

    /**
     * Low Res Url
     * @var string
     */
    protected $low_res_url;

    /**
     * Latitude
     * @var int
     */
    protected $lat;

    /**
     * Longitude
     * @var int
     */
    protected $lng;

    /**
     * Thumbnail
     * @var string
     */
    protected $thumbnail;

    /**
     * @return string
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * @param string $media_id
     */
    public function setMediaId($media_id)
    {
        $this->media_id = $media_id;
    }

    /**
     * @return string
     */
    public function getDisplayUrl()
    {
        return $this->display_url;
    }

    /**
     * @param string $display_url
     */
    public function setDisplayUrl($display_url)
    {
        $this->display_url = $display_url;
    }

    /**
     * @return string
     */
    public function getLowResUrl()
    {
        return $this->low_res_url;
    }

    /**
     * @param string $low_res_url
     */
    public function setLowResUrl($low_res_url)
    {
        $this->low_res_url = $low_res_url;
    }

    /**
     * @return int
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param int $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return int
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @param int $lng
     */
    public function setLng($lng)
    {
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param string $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

}