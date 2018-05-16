<?php

namespace Instagram\API\Request;

use Instagram\API\Constants;
use Instagram\API\Response\PlacesFacebookSearchResponse;
use Instagram\Instagram;

class PlacesFacebookSearchRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     */
    public function __construct($instagram){

        parent::__construct($instagram);

        $this->addParam("timezone_offset", Constants::TIMEZONE_OFFSET);
        $this->addParam("count", "50");

    }

    /**
     * Search Places by Query
     * @param $query string Search Query
     */
    public function searchByQuery($query){
        if($query != null){
            $this->addParam("query", $query);
            $this->addParam("rank_token", $this->instagram->getUserRankToken());
        }
    }

    /**
     * Search Places by Location
     * @param $lat string Latitude
     * @param $long string Longitude
     */
    public function searchByLocation($lat, $long){
        if($lat != null && $long != null){
            $this->addParam("lat", $lat);
            $this->addParam("lng", $long);
        }
    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "/v1/fbsearch/places/";
    }

    public function getResponseObject(){
        return new PlacesFacebookSearchResponse();
    }

    /**
     * @return PlacesFacebookSearchResponse
     */
    public function execute(){
        return parent::execute();
    }

}