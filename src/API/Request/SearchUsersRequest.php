<?php

namespace Instagram\API\Request;

use Instagram\API\Constants;
use Instagram\API\Response\SearchUsersResponse;
use Instagram\Instagram;

class SearchUsersRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $query string Query
     */
    public function __construct($instagram, $query){

        parent::__construct($instagram);

        $this->addParam("timezone_offset", Constants::TIMEZONE_OFFSET);
        $this->addParam("q", $query);
        $this->addParam("count", "50");
        $this->addParam("rank_token", $instagram->getUserRankToken());

    }

    public function getMethod(){
        return self::GET;
    }

    public function getEndpoint(){
        return "/v1/users/search/";
    }

    public function getResponseObject(){
        return new SearchUsersResponse();
    }

    /**
     * @return SearchUsersResponse
     */
    public function execute(){
        return parent::execute();
    }

}