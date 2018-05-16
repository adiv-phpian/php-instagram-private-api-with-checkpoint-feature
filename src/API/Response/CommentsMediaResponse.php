<?php

namespace Instagram\API\Response;

class CommentsMediaResponse extends BaseResponse {

    /**
     * Caption is Edited
     * @var boolean
     */
    protected $caption_is_edited;

    /**
     * Has more Comments
     * @var boolean
     */
    protected $has_more_comments;

    /**
     * Comment
     * @var Model\Comment[]
     */
    protected $comments;

    /**
     * Next Maximum Id
     * @var string
     */
    protected $next_max_id;

    /**
     * Caption
     * @var Model\Caption
     */
    protected $caption;

    /**
     * Comment Count
     * @var int
     */
    protected $comment_count;

    /**
     * @return boolean
     */
    public function isCaptionIsEdited()
    {
        return $this->caption_is_edited;
    }

    /**
     * @param boolean $caption_is_edited
     */
    public function setCaptionIsEdited($caption_is_edited)
    {
        $this->caption_is_edited = $caption_is_edited;
    }

    /**
     * @return boolean
     */
    public function isHasMoreComments()
    {
        return $this->has_more_comments;
    }

    /**
     * @param boolean $has_more_comments
     */
    public function setHasMoreComments($has_more_comments)
    {
        $this->has_more_comments = $has_more_comments;
    }

    /**
     * @return Model\Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Model\Comment[] $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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
     * @return Model\Caption
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param Model\Caption $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return int
     */
    public function getCommentCount()
    {
        return $this->comment_count;
    }

    /**
     * @param int $comment_count
     */
    public function setCommentCount($comment_count)
    {
        $this->comment_count = $comment_count;
    }

}