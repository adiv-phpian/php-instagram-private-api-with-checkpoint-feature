<?php

namespace Instagram\API\Request;

use Instagram\API\Response\BlockFriendshipResponse;
use Instagram\Instagram;

class BlockFriendshipRequest extends AuthenticatedBaseRequest {

    protected $userId;

    /**
     * @param $instagram Instagram
     * @param $userId string User Id
     */
    public function __construct($instagram, $userId){

        parent::__construct($instagram);

        $this->userId = $userId;

        $this->setSignedBody(array(
            "_csrftoken" => $instagram->getCSRFToken(),
            "user_id" => $userId,
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID()
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return sprintf("/v1/friendships/block/%s/", $this->userId);
    }

    public function getResponseObject(){
        return new BlockFriendshipResponse();
    }

    /**
     * @return BlockFriendshipResponse
     */
    public function execute(){
        return parent::execute();
    }

}