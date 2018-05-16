<?php

namespace Instagram\API\Response\Model;

class Comment extends Model {

    /**
     * Status
     * @var string
     */
    protected $status;

    /**
     * User Id
     * @var int
     */
    protected $user_id;

    /**
     * Created at UTC
     * @var int
     */
    protected $created_at_utc;

    /**
     * Created at
     * @var int
     */
    protected $created_at;

    /**
     * User
     * @var User
     */
    protected $user;

    /**
     * Content Type
     * @var string
     */
    protected $content_type;

    /**
     * Text
     * @var string
     */
    protected $text;

    /**
     * Media Id
     * @var int
     */
    protected $media_id;

    /**
     * Type
     * @var int
     */
    protected $type;

    /**
     * Id
     * @var float
     */
    protected $pk;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getCreatedAtUtc()
    {
        return $this->created_at_utc;
    }

    /**
     * @param int $created_at_utc
     */
    public function setCreatedAtUtc($created_at_utc)
    {
        $this->created_at_utc = $created_at_utc;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param int $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * @param string $content_type
     */
    public function setContentType($content_type)
    {
        $this->content_type = $content_type;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getMediaId()
    {
        return $this->media_id;
    }

    /**
     * @param int $media_id
     */
    public function setMediaId($media_id)
    {
        $this->media_id = $media_id;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getPk()
    {
        return number_format($this->pk, 0, '.', '');
    }

    /**
     * @param float $pk
     */
    public function setPk($pk)
    {
        $this->pk = $pk;
    }

}