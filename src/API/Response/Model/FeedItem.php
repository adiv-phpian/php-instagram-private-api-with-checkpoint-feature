<?php

namespace Instagram\API\Response\Model;

class FeedItem extends Model {

    const MEDIA_TYPE_IMAGE = 1;
    const MEDIA_TYPE_VIDEO = 2;

    /**
     * Taken At
     * @var float
     */
    protected $taken_at;

    /**
     * Id
     * @var string
     */
    protected $pk;

    /**
     * Id
     * @var string
     */
    protected $id;

    /**
     * Device Timestamp
     * @var float
     */
    protected $device_timestamp;

    /**
     * Media Type
     * @var int
     */
    protected $media_type;

    /**
     * Code
     * @var string
     */
    protected $code;

    /**
     * Filter Type
     * @var int
     */
    protected $filter_type;

    /**
     * Image Versions
     * @var ImageVersions2
     */
    protected $image_versions2;

    /**
     * Original Width
     * @var int
     */
    protected $original_width;

    /**
     * Original Height
     * @var int
     */
    protected $original_height;

    /**
     * View Count
     * @var int
     */
    protected $view_count;

    /**
     * User
     * @var User
     */
    protected $user;

    /**
     * Likers
     * @var User[]
     */
    protected $likers;

    /**
     * Like Count
     * @var int
     */
    protected $like_count;

    /**
     * Has Liked
     * @var boolean
     */
    protected $has_liked;

    /**
     * Has more Comments
     * @var boolean
     */
    protected $has_more_comments;

    /**
     * Comments
     * @var Comment[]
     */
    protected $comments;

    /**
     * Comment Count
     * @var int
     */
    protected $comment_count;

    /**
     * Caption
     * @var Caption
     */
    protected $caption;

    /**
     * Caption is Edited
     * @var boolean
     */
    protected $caption_is_edited;

    /**
     * Photo of You
     * @var boolean
     */
    protected $photo_of_you;

    /**
     * Video Versions
     * @var VideoVersion[]
     */
    protected $video_versions;

    /**
     * Has Audio
     * @var boolean
     */
    protected $has_audio;

    /**
     * Ad Type
     * @var int
     */
    protected $dr_ad_type;


    /**
     * @return float
     */
    public function getTakenAt()
    {
        return $this->taken_at;
    }

    /**
     * @param float $taken_at
     */
    public function setTakenAt($taken_at)
    {
        $this->taken_at = $taken_at;
    }

    /**
     * @return string
     */
    public function getPk()
    {
        return $this->pk;
    }

    /**
     * @param string $pk
     */
    public function setPk($pk)
    {
        $this->pk = $pk;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return float
     */
    public function getDeviceTimestamp()
    {
        return $this->device_timestamp;
    }

    /**
     * @param float $device_timestamp
     */
    public function setDeviceTimestamp($device_timestamp)
    {
        $this->device_timestamp = $device_timestamp;
    }

    /**
     * @return int
     */
    public function getMediaType()
    {
        return $this->media_type;
    }

    /**
     * @param int $media_type
     */
    public function setMediaType($media_type)
    {
        $this->media_type = $media_type;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getFilterType()
    {
        return $this->filter_type;
    }

    /**
     * @param int $filter_type
     */
    public function setFilterType($filter_type)
    {
        $this->filter_type = $filter_type;
    }

    /**
     * @return ImageVersions2
     */
    public function getImageVersions2()
    {
        return $this->image_versions2;
    }

    /**
     * @param ImageVersions2 $image_versions2
     */
    public function setImageVersions2($image_versions2)
    {
        $this->image_versions2 = $image_versions2;
    }

    /**
     * @return int
     */
    public function getOriginalWidth()
    {
        return $this->original_width;
    }

    /**
     * @param int $original_width
     */
    public function setOriginalWidth($original_width)
    {
        $this->original_width = $original_width;
    }

    /**
     * @return int
     */
    public function getOriginalHeight()
    {
        return $this->original_height;
    }

    /**
     * @param int $original_height
     */
    public function setOriginalHeight($original_height)
    {
        $this->original_height = $original_height;
    }

    /**
     * @return int
     */
    public function getViewCount()
    {
        return $this->view_count;
    }

    /**
     * @param int $view_count
     */
    public function setViewCount($view_count)
    {
        $this->view_count = $view_count;
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
     * @return User[]
     */
    public function getLikers()
    {
        return $this->likers;
    }

    /**
     * @param User[] $likers
     */
    public function setLikers($likers)
    {
        $this->likers = $likers;
    }

    /**
     * @return int
     */
    public function getLikeCount()
    {
        return $this->like_count;
    }

    /**
     * @param int $like_count
     */
    public function setLikeCount($like_count)
    {
        $this->like_count = $like_count;
    }

    /**
     * @return boolean
     */
    public function isHasLiked()
    {
        return $this->has_liked;
    }

    /**
     * @param boolean $has_liked
     */
    public function setHasLiked($has_liked)
    {
        $this->has_liked = $has_liked;
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
     * @return Comment[]
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment[] $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
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

    /**
     * @return Caption
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param Caption $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

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
    public function isPhotoOfYou()
    {
        return $this->photo_of_you;
    }

    /**
     * @param boolean $photo_of_you
     */
    public function setPhotoOfYou($photo_of_you)
    {
        $this->photo_of_you = $photo_of_you;
    }

    /**
     * @return VideoVersion[]
     */
    public function getVideoVersions()
    {
        return $this->video_versions;
    }

    /**
     * @param VideoVersion[] $video_versions
     */
    public function setVideoVersions($video_versions)
    {
        $this->video_versions = $video_versions;
    }

    /**
     * @return boolean
     */
    public function isHasAudio()
    {
        return $this->has_audio;
    }

    /**
     * @param boolean $has_audio
     */
    public function setHasAudio($has_audio)
    {
        $this->has_audio = $has_audio;
    }

    /**
     * @return int
     */
    public function getDrAdType()
    {
        return $this->dr_ad_type;
    }

    /**
     * @param int $dr_ad_type
     */
    public function setDrAdType($dr_ad_type)
    {
        $this->dr_ad_type = $dr_ad_type;
    }

    /**
     * Is Image
     * @return boolean
     */
    public function isImage(){
        return $this->getMediaType() == self::MEDIA_TYPE_IMAGE;
    }

    /**
     * Is Video
     * @return boolean
     */
    public function isVideo(){
        return $this->getMediaType() == self::MEDIA_TYPE_VIDEO;
    }

    /**
     * Is Ad
     * @return boolean
     */
    public function isAd(){
        return !is_null($this->getDrAdType());
    }

}