<?php

namespace Instagram\API\Request;

use Instagram\API\Response\EditProfileAccountResponse;
use Instagram\API\Response\Model\User;
use Instagram\Instagram;

class EditProfileAccountRequest extends AuthenticatedBaseRequest {

    /**
     * @param $instagram Instagram
     * @param $firstname string Name
     * @param $email string Email
     * @param $phoneNumber string Phone Number
     * @param $gender int Gender
     * @param $biography string Biography
     * @param $externalUrl string External Url
     */
    public function __construct($instagram, $firstname, $email, $phoneNumber, $gender, $biography, $externalUrl){

        parent::__construct($instagram);

        $firstname = $firstname != null ? $firstname : "";
        $email = $email != null ? $email : "";
        $phoneNumber = $phoneNumber != null ? $phoneNumber : "";
        $gender = $gender != null ? $gender : User::GENDER_NOT_SPECIFIED;
        $biography = $biography != null ? $biography : "";
        $externalUrl = $externalUrl != null ? $externalUrl : "";

        $this->setSignedBody(array(
            "external_url" => $externalUrl,
            "gender" => $gender,
            "phone_number" => $phoneNumber,
            "_csrftoken" => $instagram->getCSRFToken(),
            "username" => $instagram->getLoggedInUser()->getUsername(),
            "first_name" => $firstname,
            "_uid" => $instagram->getLoggedInUser()->getPk(),
            "biography" => $biography,
            "_uuid" => $instagram->getUUID(),
            "email" => $email
        ));

    }

    public function getMethod(){
        return self::POST;
    }

    public function getEndpoint(){
        return "/v1/accounts/edit_profile/";
    }

    public function getResponseObject(){
        return new EditProfileAccountResponse();
    }

    /**
     * @return EditProfileAccountResponse
     */
    public function execute(){
        return parent::execute();
    }

}