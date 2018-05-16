<?php

namespace Instagram\API\Response;

class PlacesFacebookSearchResponse extends BaseResponse {

    /**
     * Users
     * @var Model\Place[]
     */
    protected $items;

    /**
     * @return Model\Place[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Model\Place[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }

}