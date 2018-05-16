<?php

namespace Instagram\API\Response;

class SearchUsersResponse extends BaseResponse {

    /**
     * Has More
     * @var boolean
     */
    protected $has_more;

    /**
     * Number of Results
     * @var int
     */
    protected $num_results;

    /**
     * Users
     * @var Model\User[]
     */
    protected $users;

    /**
     * @return boolean
     */
    public function isHasMore()
    {
        return $this->has_more;
    }

    /**
     * @param boolean $has_more
     */
    public function setHasMore($has_more)
    {
        $this->has_more = $has_more;
    }

    /**
     * @return int
     */
    public function getNumResults()
    {
        return $this->num_results;
    }

    /**
     * @param int $num_results
     */
    public function setNumResults($num_results)
    {
        $this->num_results = $num_results;
    }

    /**
     * @return Model\User[]
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param Model\User[] $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }

}