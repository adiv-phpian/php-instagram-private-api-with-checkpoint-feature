<?php

namespace Instagram\API\Response;

class TagFeedResponse extends BaseResponse {

    /**
     * Number of Results
     * @var int
     */
    protected $num_results;

    /**
     * Ranked Feed Items
     * @var Model\FeedItem[]
     */
    protected $ranked_items;

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
     * Next Maximum Id
     * @var string
     */
    protected $next_max_id;

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
    public function getRankedItems()
    {
        return $this->ranked_items;
    }

    /**
     * @param Model\FeedItem[] $ranked_items
     */
    public function setRankedItems($ranked_items)
    {
        $this->ranked_items = $ranked_items;
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

}