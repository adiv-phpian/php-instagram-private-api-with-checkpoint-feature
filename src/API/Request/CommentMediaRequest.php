<?php

namespace Instagram\API\Request;

use Instagram\API\Response\CommentMediaResponse;
use Instagram\Instagram;

class CommentMediaRequest extends AuthenticatedBaseRequest {

    protected $mediaId;

    /**
     * @param $instagram Instagram
     * @param $mediaId string Media Id
     * @param $comment string Comment
     */
    public function __construct($instagram, $mediaId, $comment){

        parent::__construct($instagram);

        $this->mediaId = $mediaId;

        //TODO: Add Parameters to Signed Body 'user_breadcrumb' and 'idempotence_token'

        $this->setSignedBody(array(
            "comment_text" => $comment,
            "_csrftoken" => $instagram->getCSRFToken(),
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "_uuid" => $instagram->getUUID()
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return sprintf("/v1/media/%s/comment/", $this->mediaId);
    }

    public function getResponseObject(){
        return new CommentMediaResponse();
    }

    /**
     * @return CommentMediaResponse
     */
    public function execute(){
        return parent::execute();
    }

}