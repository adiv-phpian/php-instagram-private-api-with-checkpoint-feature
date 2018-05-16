<?php

namespace Instagram\API\Response;

class ShowFriendshipResponse extends BaseResponse {

    /**
     * Incoming Request
     * @var boolean
     */
    protected $incoming_request;

    /**
     * Outgoing Request
     * @var boolean
     */
    protected $outgoing_request;

    /**
     * Following
     * @var boolean
     */
    protected $following;

    /**
     * Followed By
     * @var boolean
     */
    protected $followed_by;

    /**
     * Blocking
     * @var boolean
     */
    protected $blocking;

    /**
     * Private
     * @var boolean
     */
    protected $is_private;

    /**
     * @return boolean
     */
    public function isIncomingRequest()
    {
        return $this->incoming_request;
    }

    /**
     * @param boolean $incoming_request
     */
    public function setIncomingRequest($incoming_request)
    {
        $this->incoming_request = $incoming_request;
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
    public function isFollowedBy()
    {
        return $this->followed_by;
    }

    /**
     * @param boolean $followed_by
     */
    public function setFollowedBy($followed_by)
    {
        $this->followed_by = $followed_by;
    }

    /**
     * @return boolean
     */
    public function isBlocking()
    {
        return $this->blocking;
    }

    /**
     * @param boolean $blocking
     */
    public function setBlocking($blocking)
    {
        $this->blocking = $blocking;
    }

    /**
     * @return boolean
     */
    public function isIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * @param boolean $is_private
     */
    public function setIsPrivate($is_private)
    {
        $this->is_private = $is_private;
    }

}