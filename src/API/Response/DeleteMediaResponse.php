<?php

namespace Instagram\API\Response;

class DeleteMediaResponse extends BaseResponse {

    /**
     * Did Delete
     * @var boolean
     */
    protected $did_delete;

    /**
     * @return boolean
     */
    public function isDidDelete()
    {
        return $this->did_delete;
    }

    /**
     * @param boolean $did_delete
     */
    public function setDidDelete($did_delete)
    {
        $this->did_delete = $did_delete;
    }

}