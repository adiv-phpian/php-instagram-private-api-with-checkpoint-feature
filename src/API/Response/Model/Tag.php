<?php

namespace Instagram\API\Response\Model;

class Tag extends Model {

    /**
     * Id
     * @var string
     */
    protected $id;

    /**
     * Name
     * @var string
     */
    protected $name;

    /**
     * Media Count
     * @var int
     */
    protected $media_count;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getMediaCount()
    {
        return $this->media_count;
    }

    /**
     * @param int $media_count
     */
    public function setMediaCount($media_count)
    {
        $this->media_count = $media_count;
    }

}