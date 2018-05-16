<?php

namespace Instagram\API\Response;

class ChangeProfilePictureAccountResponse extends BaseResponse {

    /**
     * User
     * @var Model\User
     */
    protected $user;

    /**
     * @return Model\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param Model\User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}