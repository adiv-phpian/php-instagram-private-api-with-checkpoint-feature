<?php

namespace Instagram\API\Response;

class UserFeedResponse extends BaseResponse {

    /**
     * Number of Results
     * @var int
     */
    protected $num_results;

    /**
     * Feed Items
     * @var Model\FeedItem[]
     */
    protected $items;

    /**
     * More items available
     * @var boolean
     */
    protected $more_available;

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
     * @return Model\FeedItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Model\FeedItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

    /**
     * @return boolean
     */
    public function isMoreAvailable()
    {
        return $this->more_available;
    }

    /**
     * @param boolean $more_available
     */
    public function setMoreAvailable($more_available)
    {
        $this->more_available = $more_available;
    }

}