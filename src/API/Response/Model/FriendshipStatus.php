<?php

namespace Instagram\API\Response\Model;

class FriendshipStatus extends Model {

    /**
     * Following
     * @var boolean
     */
    protected $following;

    /**
     * Outgoing Request
     * @var boolean
     */
    protected $outgoing_request;

    /**
     * @return boolean
     */
    public function isFollowing()
    {
        return $this->following;
    }

    /**
     * @param boolean $following
     */
    public function setFollowing($following)
    {
        $this->following = $following;
    }

    /**
     * @return boolean
     */
    public function isOutgoingRequest()
    {
        return $this->outgoing_request;
    }

    /**
     * @param boolean $outgoing_request
     */
    public function setOutgoingRequest($outgoing_request)
    {
        $this->outgoing_request = $outgoing_request;
    }

}