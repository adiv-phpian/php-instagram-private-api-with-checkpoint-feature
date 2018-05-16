<?php

namespace Instagram\API\Response;

class CommentMediaResponse extends BaseResponse {

    /**
     * Comment
     * @var Model\Comment
     */
    protected $comment;

    /**
     * @return Model\Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param Model\Comment $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

}