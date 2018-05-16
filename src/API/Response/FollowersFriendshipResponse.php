<?php

namespace Instagram\API\Response;

class FollowersFriendshipResponse extends BaseResponse {

    /**
     * Page Size
     * @var int
     */
    protected $page_size;

    /**
     * Next Maximum Id
     * @var string
     */
    protected $next_max_id;

    /**
     * Follower Sections
     * @var Model\FollowerSection[]
     */
    protected $sections;

    /**
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * @param int $page_size
     */
    public function setPageSize($page_size)
    {
        $this->page_size = $page_size;
    }

    /**
     * @return string
     */
    public function getNextMaxId()
    {
        return $this->next_max_id;
    }

    /**
     * @param string $next_max_id
     */
    public function setNextMaxId($next_max_id)
    {
        $this->next_max_id = $next_max_id;
    }

    /**
     * @return Model\FollowerSection[]
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param Model\FollowerSection[] $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }

    /**
     * Get Followers by iterating over all Sections
     * @return Model\User[]
     */
    public function getFollowers(){

        $followers = array();
        $sections = $this->getSections();

        if($sections != null){
            foreach($sections as $section){

                $users = $section->getUsers();
                if($users != null){
                    foreach($users as $user){
                        $followers[] = $user;
                    }
                }

            }
        }

        return $followers;

    }

}
