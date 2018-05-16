<?php

namespace Instagram\API\Response\Model;

class FollowingSection extends Model {

    /**
     * Title
     * @var string
     */
    protected $title;

    /**
     * Users
     * @var User[]
     */
    protected $users;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

}