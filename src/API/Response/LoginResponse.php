<?php

namespace Instagram\API\Response;

class LoginResponse extends BaseResponse {

    /**
     * Logged in User
     * @var Model\User
     */
    protected $logged_in_user;

    /**
     * Checkpoint Url
     * @var string
     */
    protected $checkpoint_url;

    /**
     * @return Model\User
     */
    public function getLoggedInUser()
    {
        return $this->logged_in_user;
    }

    /**
     * @param Model\User $logged_in_user
     */
    public function setLoggedInUser($logged_in_user)
    {
        $this->logged_in_user = $logged_in_user;
    }

    /**
     * @return string
     */
    public function getCheckpointUrl()
    {
        return $this->checkpoint_url;
    }

    /**
     * @param string $checkpoint_url
     */
    public function setCheckpointUrl($checkpoint_url)
    {
        $this->checkpoint_url = $checkpoint_url;
    }

}