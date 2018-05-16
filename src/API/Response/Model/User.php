<?php

namespace Instagram\API\Response\Model;

class User extends Model {

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_NOT_SPECIFIED = 3;

    /**
     * Username
     * @var string
     */
    public $username;

    /**
     * User Tags Count
     * @var int
     */
    public $usertags_count;

    /**
     * Phone Number
     * @var string
     */
    public $phone_number;

    /**
     * Has Anonymous Profile Picture
     * @var boolean
     */
    public $has_anonymous_profile_picture;

    /**
     * Media Count
     * @var int
     */
    public $media_count;

    /**
     * HD Profile Picture Versions
     * @var HDProfilePicURLInfo[]
     */
    public $hd_profile_pic_versions;

    /**
     * Following Count
     * @var int
     */
    public $following_count;

    /**
     * Business
     * @var boolean
     */
    public $is_business;

    /**
     * Geo Media Count
     * @var int
     */
    public $geo_media_count;

    /**
     * Country Code
     * @var int
     */
    public $country_code;

    /**
     * Unpublished
     * @var boolean
     */
    public $is_unpublished;

    /**
     * Friendship Status
     * @var FriendshipStatus
     */
    public $friendship_status;

    /**
     * Gender
     * @var int
     */
    public $gender;

    /**
     * Birthday
     * @var string
     */
    public $birthday;

    /**
     * National Phone Number
     * @var int
     */
    public $national_number;

    /**
     * Mutual Followers Count
     * @var int
     */
    public $mutual_followers_count;

    /**
     * Profile Picture Url
     * @var string
     */
    public $profile_pic_url;

    /**
     * Favourite
     * @var boolean
     */
    public $is_favourite;

    /**
     * Biography
     * @var string
     */
    public $biography;

    /**
     * Full Name
     * @var string
     */
    public $full_name;

    /**
     * Follower Count
     * @var int
     */
    public $follower_count;

    /**
     * Id
     * @var string
     */
    public $pk;

    /**
     * Verified
     * @var boolean
     */
    public $is_verified;

    /**
     * Private
     * @var boolean
     */
    public $is_private;

    /**
     * HD Profile Picture URL Info
     * @var HDProfilePicURLInfo
     */
    public $hd_profile_pic_url_info;

    /**
     * Email
     * @var string
     */
    public $email;

    /**
     * External Url
     * @var string
     */
    public $external_url;

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return int
     */
    public function getUsertagsCount()
    {
        return $this->usertags_count;
    }

    /**
     * @param int $usertags_count
     */
    public function setUsertagsCount($usertags_count)
    {
        $this->usertags_count = $usertags_count;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return boolean
     */
    public function isHasAnonymousProfilePicture()
    {
        return $this->has_anonymous_profile_picture;
    }

    /**
     * @param boolean $has_anonymous_profile_picture
     */
    public function setHasAnonymousProfilePicture($has_anonymous_profile_picture)
    {
        $this->has_anonymous_profile_picture = $has_anonymous_profile_picture;
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

    /**
     * @return HDProfilePicURLInfo[]
     */
    public function getHdProfilePicVersions()
    {
        return $this->hd_profile_pic_versions;
    }

    /**
     * @param HDProfilePicURLInfo[] $hd_profile_pic_versions
     */
    public function setHdProfilePicVersions($hd_profile_pic_versions)
    {
        $this->hd_profile_pic_versions = $hd_profile_pic_versions;
    }

    /**
     * @return int
     */
    public function getFollowingCount()
    {
        return $this->following_count;
    }

    /**
     * @param int $following_count
     */
    public function setFollowingCount($following_count)
    {
        $this->following_count = $following_count;
    }

    /**
     * @return boolean
     */
    public function isIsBusiness()
    {
        return $this->is_business;
    }

    /**
     * @param boolean $is_business
     */
    public function setIsBusiness($is_business)
    {
        $this->is_business = $is_business;
    }

    /**
     * @return int
     */
    public function getGeoMediaCount()
    {
        return $this->geo_media_count;
    }

    /**
     * @param int $geo_media_count
     */
    public function setGeoMediaCount($geo_media_count)
    {
        $this->geo_media_count = $geo_media_count;
    }

    /**
     * @return int
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * @param int $country_code
     */
    public function setCountryCode($country_code)
    {
        $this->country_code = $country_code;
    }

    /**
     * @return boolean
     */
    public function isIsUnpublished()
    {
        return $this->is_unpublished;
    }

    /**
     * @param boolean $is_unpublished
     */
    public function setIsUnpublished($is_unpublished)
    {
        $this->is_unpublished = $is_unpublished;
    }

    /**
     * @return FriendshipStatus
     */
    public function getFriendshipStatus()
    {
        return $this->friendship_status;
    }

    /**
     * @param FriendshipStatus $friendship_status
     */
    public function setFriendshipStatus($friendship_status)
    {
        $this->friendship_status = $friendship_status;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return int
     */
    public function getNationalNumber()
    {
        return $this->national_number;
    }

    /**
     * @param int $national_number
     */
    public function setNationalNumber($national_number)
    {
        $this->national_number = $national_number;
    }

    /**
     * @return int
     */
    public function getMutualFollowersCount()
    {
        return $this->mutual_followers_count;
    }

    /**
     * @param int $mutual_followers_count
     */
    public function setMutualFollowersCount($mutual_followers_count)
    {
        $this->mutual_followers_count = $mutual_followers_count;
    }

    /**
     * @return string
     */
    public function getProfilePicUrl()
    {
        return $this->profile_pic_url;
    }

    /**
     * @param string $profile_pic_url
     */
    public function setProfilePicUrl($profile_pic_url)
    {
        $this->profile_pic_url = $profile_pic_url;
    }

    /**
     * @return boolean
     */
    public function isIsFavourite()
    {
        return $this->is_favourite;
    }

    /**
     * @param boolean $is_favourite
     */
    public function setIsFavourite($is_favourite)
    {
        $this->is_favourite = $is_favourite;
    }

    /**
     * @return string
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @return int
     */
    public function getFollowerCount()
    {
        return $this->follower_count;
    }

    /**
     * @param int $follower_count
     */
    public function setFollowerCount($follower_count)
    {
        $this->follower_count = $follower_count;
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
     * @return boolean
     */
    public function isIsVerified()
    {
        return $this->is_verified;
    }

    /**
     * @param boolean $is_verified
     */
    public function setIsVerified($is_verified)
    {
        $this->is_verified = $is_verified;
    }

    /**
     * @return boolean
     */
    public function isIsPrivate()
    {
        return $this->is_private;
    }

    /**
     * @param boolean $is_private
     */
    public function setIsPrivate($is_private)
    {
        $this->is_private = $is_private;
    }

    /**
     * @return HDProfilePicURLInfo
     */
    public function getHdProfilePicUrlInfo()
    {
        return $this->hd_profile_pic_url_info;
    }

    /**
     * @param HDProfilePicURLInfo $hd_profile_pic_url_info
     */
    public function setHdProfilePicUrlInfo($hd_profile_pic_url_info)
    {
        $this->hd_profile_pic_url_info = $hd_profile_pic_url_info;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getExternalUrl()
    {
        return $this->external_url;
    }

    /**
     * @param string $external_url
     */
    public function setExternalUrl($external_url)
    {
        $this->external_url = $external_url;
    }

}
