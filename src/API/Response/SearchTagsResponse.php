<?php

namespace Instagram\API\Response;

class SearchTagsResponse extends BaseResponse {

    /**
     * Has More
     * @var boolean
     */
    protected $has_more;

    /**
     * Results
     * @var Model\Tag[]
     */
    protected $results;

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
     * @return Model\Tag[]
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @param Model\Tag[] $results
     */
    public function setResults($results)
    {
        $this->results = $results;
    }

}