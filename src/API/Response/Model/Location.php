<?php

namespace Instagram\API\Response\Model;

class Location extends Model {

    /**
     * City
     * @var string
     */
    protected $city;

    /**
     * Name
     * @var string
     */
    protected $name;

    /**
     * Facebook Places ID
     * @var string
     */
    protected $facebook_places_id;

    /**
     * Address
     * @var string
     */
    protected $address;

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
     * Id
     * @var int
     */
    protected $pk;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFacebookPlacesId()
    {
        return $this->facebook_places_id;
    }

    /**
     * @param string $facebook_places_id
     */
    public function setFacebookPlacesId($facebook_places_id)
    {
        $this->facebook_places_id = $facebook_places_id;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
     * @return int
     */
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * @param int $pk
     */
    public function setPk($pk)
    {
        $this->pk = $pk;
    }

}