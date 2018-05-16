<?php

namespace Instagram\API\Response;

class DestroyFriendshipResponse extends BaseResponse {

    /**
     * Friendship Status
     * @var Model\FriendshipStatus
     */
    protected $friendship_status;

    /**
     * @return Model\FriendshipStatus
     */
    public function getFriendshipStatus()
    {
        return $this->friendship_status;
    }

    /**
     * @param Model\FriendshipStatus $friendship_status
     */
    public function setFriendshipStatus($friendship_status)
    {
        $this->friendship_status = $friendship_status;
    }

}