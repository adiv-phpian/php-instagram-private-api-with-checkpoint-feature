<?php

namespace Instagram;

use Exception;
use Instagram\API\Constants;
use Instagram\API\Framework\InstagramException;
use Instagram\API\Request\BlockFriendshipRequest;
use Instagram\API\Request\BulkDeleteCommentsMediaRequest;
use Instagram\API\Request\ChangeProfilePictureAccountRequest;
use Instagram\API\Request\CommentMediaRequest;
use Instagram\API\Request\CommentsMediaRequest;
use Instagram\API\Request\ConfigureMediaRequest;
use Instagram\API\Request\CreateFriendshipRequest;
use Instagram\API\Request\CurrentUserAccountRequest;
use Instagram\API\Request\DeleteMediaRequest;
use Instagram\API\Request\DestroyFriendshipRequest;
use Instagram\API\Request\EditMediaRequest;
use Instagram\API\Request\EditProfileAccountRequest;
use Instagram\API\Request\FollowersFriendshipRequest;
use Instagram\API\Request\FollowingFriendshipRequest;
use Instagram\API\Request\InfoMediaRequest;
use Instagram\API\Request\InfoUserRequest;
use Instagram\API\Request\LikedFeedRequest;
use Instagram\API\Request\LikeMediaRequest;
use Instagram\API\Request\LocationFeedRequest;
use Instagram\API\Request\LoginRequest;
use Instagram\API\Request\ChallengeRequest;
use Instagram\API\Request\ChallengeMethods;
use Instagram\API\Request\Challenge_sendcode;
use Instagram\API\Request\Challenge_confirm_code;
use Instagram\API\Request\Challenge_sendcode_again;
use Instagram\API\Request\SaveSession;
use Instagram\API\Request\LogoutRequest;
use Instagram\API\Request\PhotoUploadRequest;
use Instagram\API\Request\PlacesFacebookSearchRequest;
use Instagram\API\Request\RemoveProfilePictureAccountRequest;
use Instagram\API\Request\SearchTagsRequest;
use Instagram\API\Request\SearchUsersRequest;
use Instagram\API\Request\SetPrivateAccountRequest;
use Instagram\API\Request\SetPublicAccountRequest;
use Instagram\API\Request\ShowFriendshipRequest;
use Instagram\API\Request\TagFeedRequest;
use Instagram\API\Request\TimelineFeedRequest;
use Instagram\API\Request\UnblockFriendshipRequest;
use Instagram\API\Request\UnlikeMediaRequest;
use Instagram\API\Request\UserFeedRequest;
use Instagram\API\Request\UserMapRequest;
use Instagram\API\Request\UserTagsFeedRequest;
use Instagram\API\Response\Model\FeedItem;
use Instagram\API\Response\Model\Location;
use Instagram\API\Response\Model\User;
use Ramsey\Uuid\Uuid;

class Instagram {

    /**
     *
     * Logged in User
     *
     * @var API\Response\Model\User
     */
    public $loggedInUser;

    /**
     *
     * Instagram Cookies
     *
     * @var array
     */
    public $cookies;

    /**
     *
     * Instagram CSRF Token
     *
     * @var string
     */
    public $csrfToken;

    /**
     *
     * Instagram Rank Token
     *
     * @var string
     */
    public $rankToken;

    /**
     *
     * Instagram Phone ID
     *
     * @var string
     */
    public $phoneId;

    /**
     *
     * Instagram Device ID
     *
     * @var string
     */
    public $deviceId;

    /**
     *
     * Instagram GUID
     *
     * @var string
     */
    public $guid;

    /**
     *
     * Instagram UUID
     *
     * @var string
     */
    public $uuid;

    /**
     *
     * Google Ad Id
     *
     * @var string
     */
    public $googleAdId;

    /**
     * HTTP Proxy to be used for Instagram API Requests
     * @var string
     */
    public $proxy;

    /**
     * HTTP Proxy to be used for Instagram API Requests
     * @var string
     */
    public $proxyCredentials;

    /**
     * Enable/Disable SSL Verification of Peer
     * @var boolean
     */
    public $verifyPeer = true;

    public function __construct(){

        //Set your Timezone
        date_default_timezone_set(Constants::TIMEZONE);

    }

    /**
     *
     * Initialize the Instagram instance from a previously saved session
     *
     * @param $session string Instagram session JSON
     * @see Instagram::saveSession()
     * @throws InstagramException
     */
    public function initFromSavedSession($session){

        $session = json_decode($session, true);

        if(!$session){
            throw new InstagramException("Failed to deserialize Saved Session!");
        }

        $this->setLoggedInUser(new User($session["loggedInUser"]));
        $this->setCookies($session["cookies"]);
        $this->setCsrfToken($session["csrfToken"]);
        $this->setRankToken($session["rankToken"]);
        $this->setPhoneId($session["phoneId"]);
        $this->setDeviceId($session["deviceId"]);
        $this->setGuid($session["guid"]);
        $this->setUuid($session["uuid"]);
        $this->setGoogleAdId($session["googleAdId"]);

    }

    /**
     *
     * Save the current Instagram session to a JSON string
     *
     * @see Instagram::initFromSavedSession()
     * @return string Instagram session as JSON string
     */
    public function saveSession(){

        $session = array(
            "loggedInUser" => $this->getLoggedInUser(),
            "cookies" => $this->getCookies(),
            "csrfToken" => $this->getCSRFToken(),
            "rankToken" => $this->getRankToken(),
            "phoneId" => $this->getPhoneId(),
            "deviceId" => $this->getDeviceId(),
            "guid" => $this->getGUID(),
            "uuid" => $this->getUUID(),
            "googleAdId" => $this->getGoogleAdId(),
        );

        return json_encode($session);

    }

    /**
     * @return User
     */
    public function getLoggedInUser(){
        return $this->loggedInUser;
    }

    /**
     * @return array
     */
    public function getCookies(){
        return is_array($this->cookies) ? $this->cookies : array();
    }

    /**
     * @return string
     */
    public function getCSRFToken(){
        return $this->csrfToken;
    }

    /**
     * @return string
     */
    public function getRankToken(){
        return $this->rankToken;
    }

    /**
     * @return string
     */
    public function getUserRankToken(){

        $loggedInUser = $this->getLoggedInUser();

        if($loggedInUser != null){
            return sprintf("%s_%s", $loggedInUser->getPk(), $this->rankToken);
        }

        return $this->rankToken;

    }

    /**
     * @return string
     */
    public function getPhoneId(){
        return $this->phoneId;
    }

    /**
     * @return string
     */
    public function getDeviceId(){
        return $this->deviceId;
    }

    /**
     * @return string
     */
    public function getGUID(){
        return $this->guid;
    }

    /**
     * @return string
     */
    public function getUUID(){
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getGoogleAdId(){
        return $this->googleAdId;
    }

    /**
     * @param API\Response\Model\User $loggedInUser
     */
    public function setLoggedInUser($loggedInUser){
        $this->loggedInUser = $loggedInUser;
    }

    /**
     * @param array $cookies
     */
    public function setCookies($cookies){

        $this->cookies = $cookies;

        if(array_key_exists("csrftoken", $cookies)){
            $this->setCsrfToken($cookies["csrftoken"]);
        }

    }

    /**
     * @param string $csrfToken
     */
    public function setCsrfToken($csrfToken){
        $this->csrfToken = $csrfToken;
    }

    /**
     * @param string $rankToken
     */
    public function setRankToken($rankToken){
        $this->rankToken = $rankToken;
    }

    /**
     * @param string $phoneId
     */
    public function setPhoneId($phoneId){
        $this->phoneId = $phoneId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId($deviceId){
        $this->deviceId = $deviceId;
    }

    /**
     * @param string $guid
     */
    public function setGuid($guid){
        $this->guid = $guid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid($uuid){
        $this->uuid = $uuid;
    }

    /**
     * @param string $googleAdId
     */
    public function setGoogleAdId($googleAdId){
        $this->googleAdId = $googleAdId;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(){
        return $this->getCookies() != null && $this->getLoggedInUser() != null;
    }

    /**
     * Set the HTTP Proxy to be used for Instagram API Requests
     * @param $proxy string Proxy
     * @param string $username Proxy Username
     * @param string $password Proxy Password
     */
    public function setProxy($proxy, $username = null, $password = null){

        if(is_object($proxy)){
          $this->proxy = $proxy->ip.":".$proxy->port;

          if($proxy->username != null && $proxy->password != null){
              $this->proxyCredentials = $proxy->username . ":" . $proxy->password;
          }

        }else{
          $this->proxy = $proxy;
        }

        if($username != null && $password != null){
            $this->proxyCredentials = $username . ":" . $password;
        }
    }

    /**
     * Get the HTTP Proxy to be used for Instagram API Requests
     * @return string
     */
    public function getProxy(){
        return $this->proxy;
    }

    /**
     * Get the HTTP Proxy Credentials to be used for Instagram API Requests
     * @return string
     */
    public function getProxyCredentials(){
        return $this->proxyCredentials;
    }

    /**
     * Enable/Disable SSL Verification of Peer
     * @param $verifyPeer boolean
     */
    public function setVerifyPeer($verifyPeer){
        $this->verifyPeer = $verifyPeer;
    }

    /**
     * SSL Verification of Peer
     * @return string
     */
    public function shouldVerifyPeer(){
        return $this->verifyPeer;
    }

    /**
     * @param $seed
     * @return string
     */
    public function generateDeviceId($seed){
        $volatile_seed = filemtime(__DIR__);
        return sprintf("android-%s", substr(md5($seed.$volatile_seed), 16));
    }

    /**
     * Setup this instance with a fresh GUID, UUID and Phone ID.
     */
    public function setupAsNewDevice(){

        $guidId = Uuid::uuid4()->toString();
        $phoneId = Uuid::uuid4()->toString();
        $rankToken = Uuid::uuid4()->toString();
        $googleAdId = Uuid::uuid4()->toString();

        $this->setGuid($guidId);
        $this->setUuid($guidId);
        $this->setPhoneId($phoneId);
        $this->setRankToken($rankToken);
        $this->setGoogleAdId($googleAdId);

    }

    /**
     *
     * Login to Instagram with Credentials
     *
     * @param $username string Instagram Username
     * @param $password string Instagram Password
     * @return API\Response\LoginResponse
     * @throws Exception
     */
    public function login($username, $password){

        $this->setupAsNewDevice();
        $this->setDeviceId($this->generateDeviceId(md5($username.$password)));

        $request = new LoginRequest($this, $username, $password);
        $response = $request->execute();

        if(!$response->isOk()){

            if($response->isCheckpointRequired()){
                /*$this->sendVerificationCode($response->getCheckpointUrl());*/
                /*throw new InstagramException(sprintf("Login Failed: [%s] %s\nGo to this URL in your web browser to continue:\n%s", $response->getStatus(), $response->getMessage(), $response->getCheckpointUrl()));*/
                return array("code" => 201, "url" => $response->getCheckpointUrl());
            }

            throw new InstagramException(sprintf("Login Failed: [%s] %s", $response->getStatus(), $response->getMessage()));

        }

        $this->setLoggedInUser($response->getLoggedInUser());

        return $response;

    }

    /**
     *
     * Fetch Timeline Feed
     *
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\TimelineFeedResponse
     * @throws Exception
     */
    public function getTimelineFeed($maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getTimelineFeed().");
        }

        $request = new TimelineFeedRequest($this, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getTimelineFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Fetch User Feed
     *
     * @param string|API\Response\Model\User $userId User or User Id to get Feed of
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\UserFeedResponse
     * @throws Exception
     */
    public function getUserFeed($userId, $maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserFeed().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new UserFeedRequest($this, $userId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Fetch My User Feed
     *
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\UserFeedResponse
     * @throws Exception
     */
    public function getMyUserFeed($maxId = null){
        return $this->getUserFeed($this->getLoggedInUser()->getPk(), $maxId);
    }

    /**
     *
     * Fetch Liked Feed
     *
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\LikedFeedResponse
     * @throws Exception
     */
    public function getLikedFeed($maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getLikedFeed().");
        }

        $request = new LikedFeedRequest($this, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getLikedFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Fetch Tag Feed
     *
     * @param string $tag Tag
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\TagFeedResponse
     * @throws Exception
     */
    public function getTagFeed($tag, $maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getTagFeed().");
        }

        $request = new TagFeedRequest($this, $tag, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getTagFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Fetch Location Feed
     *
     * @param string|API\Response\Model\Location $locationId Location or Location Id to get Feed of
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\LocationFeedResponse
     * @throws Exception
     */
    public function getLocationFeed($locationId, $maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getLocationFeed().");
        }

        if($locationId instanceof Location){
            $locationId = $locationId->getPk();
        }

        $request = new LocationFeedRequest($this, $locationId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getLocationFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Fetch User Tags Feed
     *
     * @param string|API\Response\Model\User $userId User of User Id to get Tags Feed of
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\UserTagsFeedResponse
     * @throws Exception
     */
    public function getUserTagsFeed($userId, $maxId = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserTagsFeed().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new UserTagsFeedRequest($this, $userId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserTagsFeed: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Like Media
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Like
     * @return API\Response\LikeMediaResponse
     * @throws Exception
     */
    public function likeMedia($mediaId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call likeMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new LikeMediaRequest($this, $mediaId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to likeMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Unlike Media
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Unlike
     * @return API\Response\UnlikeMediaResponse
     * @throws Exception
     */
    public function unlikeMedia($mediaId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call likeMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new UnlikeMediaRequest($this, $mediaId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to unlikeMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Delete Media
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Delete
     * @param string $mediaType Media Type (Constants available in DeleteMediaRequest class)
     * @return API\Response\DeleteMediaResponse
     * @throws Exception
     */
    public function deleteMedia($mediaId, $mediaType){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call deleteMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new DeleteMediaRequest($this, $mediaId, $mediaType);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to deleteMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Comment on Media
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Comment on
     * @param string $comment Comment
     * @return API\Response\CommentMediaResponse
     * @throws Exception
     */
    public function commentOnMedia($mediaId, $comment){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call commentOnMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new CommentMediaRequest($this, $mediaId, $comment);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to commentOnMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get Media Comments
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id of Media to get Comments from
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\CommentsMediaResponse
     * @throws Exception
     */
    public function getMediaComments($mediaId, $maxId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getMediaComments().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new CommentsMediaRequest($this, $mediaId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getMediaComments: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Delete Media Comments
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Delete Comments from
     * @param array $commentIds Array of Comment Ids to Delete
     * @return API\Response\BulkDeleteCommentsMediaResponse
     * @throws Exception
     */
    public function deleteCommentsFromMedia($mediaId, $commentIds){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call deleteCommentsFromMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new BulkDeleteCommentsMediaRequest($this, $mediaId, $commentIds);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to deleteCommentsFromMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get User Info
     *
     * @param string|API\Response\Model\User $userId User or User Id to get Info of
     * @return API\Response\InfoUserResponse
     * @throws Exception
     */
    public function getUserInfo($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserInfo().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new InfoUserRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserInfo: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get User Followers
     *
     * @param string|API\Response\Model\User $userId User or User Id to get Followers of
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\FollowersFriendshipResponse
     * @throws Exception
     */
    public function getUserFollowers($userId, $maxId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserFollowers().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new FollowersFriendshipRequest($this, $userId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserFollowers: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get User Following
     *
     * @param string|API\Response\Model\User $userId User or User Id to get Following of
     * @param string $maxId Next Maximum Id, used for Pagination
     * @return API\Response\FollowingFriendshipResponse
     * @throws Exception
     */
    public function getUserFollowing($userId, $maxId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserFollowing().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new FollowingFriendshipRequest($this, $userId, $maxId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserFollowing: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get GeoMedia from Map of User
     *
     * @param string|API\Response\Model\User $userId User or User Id to get GeoMedia of
     * @return API\Response\UserMapResponse
     * @throws Exception
     */
    public function getUserMap($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getUserMap().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new UserMapRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getUserMap: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get Media Info
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to get Info of
     * @return API\Response\InfoMediaResponse
     * @throws Exception
     */
    public function getMediaInfo($mediaId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getMediaInfo().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new InfoMediaRequest($this, $mediaId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getMediaInfo: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get Current User Account
     *
     * @return API\Response\CurrentUserAccountResponse
     * @throws Exception
     */
    public function getCurrentUserAccount(){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call getCurrentUserAccount().");
        }

        $request = new CurrentUserAccountRequest($this);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to getCurrentUserAccount: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Edit User Profile
     *
     * @param string $firstname First Name
     * @param string $email Email
     * @param string $phoneNumber Phone Number
     * @param int $gender Gender (Constants available in User class)
     * @param string $biography Biography
     * @param string $externalUrl External Url
     * @return API\Response\EditProfileAccountResponse
     * @throws Exception
     */
    public function editUserProfile($firstname = null, $email = null, $phoneNumber = null, $gender = null, $biography = null, $externalUrl = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call editUserProfile().");
        }

        $currentUser = $this->getCurrentUserAccount()->getUser();

        if($firstname == null){
            $firstname = $currentUser->getFullName();
        }

        if($email == null){
            $email = $currentUser->getEmail();
        }

        if($phoneNumber == null){
            $phoneNumber = $currentUser->getPhoneNumber();
        }

        if($gender == null){
            $gender = $currentUser->getGender();
        }

        if($biography == null){
            $biography = $currentUser->getBiography();
        }

        if($externalUrl == null){
            $externalUrl = $currentUser->getExternalUrl();
        }

        $request = new EditProfileAccountRequest($this, $firstname, $email, $phoneNumber, $gender, $biography, $externalUrl);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to editUserProfile: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Set Account as Public
     *
     * @return API\Response\SetPublicAccountResponse
     * @throws Exception
     */
    public function setAccountPublic(){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call setAccountPublic().");
        }

        $request = new SetPublicAccountRequest($this);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to setAccountPublic: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Set Account as Private
     *
     * @return API\Response\SetPrivateAccountResponse
     * @throws Exception
     */
    public function setAccountPrivate(){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call setAccountPrivate().");
        }

        $request = new SetPrivateAccountRequest($this);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to setAccountPrivate: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Show Friendship between User
     *
     * @param string|API\Response\Model\User $userId User or User Id to show Friendship between
     * @return API\Response\ShowFriendshipResponse
     * @throws Exception
     */
    public function showFriendship($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call showFriendship().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new ShowFriendshipRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to showFriendship: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Follow User
     *
     * @param string|API\Response\Model\User $userId User or User Id to Follow
     * @return API\Response\CreateFriendshipResponse
     * @throws Exception
     */
    public function followUser($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call followUser().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new CreateFriendshipRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to followUser: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Unfollow User
     *
     * @param string|API\Response\Model\User $userId User or User Id to Unfollow
     * @return API\Response\DestroyFriendshipResponse
     * @throws Exception
     */
    public function unfollowUser($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call unfollowUser().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new DestroyFriendshipRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to unfollowUser: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Block User
     *
     * @param string|API\Response\Model\User $userId User or User Id to Block
     * @return API\Response\BlockFriendshipResponse
     * @throws Exception
     */
    public function blockUser($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call blockUser().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new BlockFriendshipRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to blockUser: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Unblock User
     *
     * @param string|API\Response\Model\User $userId User or User Id to Unblock
     * @return API\Response\UnblockFriendshipResponse
     * @throws Exception
     */
    public function unblockUser($userId){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call unblockUser().");
        }

        if($userId instanceof User){
            $userId = $userId->getPk();
        }

        $request = new UnblockFriendshipRequest($this, $userId);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to unblockUser: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Search Tags
     *
     * @param string $query Tag to Search for
     * @return API\Response\SearchTagsResponse
     * @throws Exception
     */
    public function searchTags($query){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call searchTags().");
        }

        $request = new SearchTagsRequest($this, $query);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to searchTags: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Search Users
     *
     * @param string $query User to Search for
     * @return API\Response\SearchUsersResponse
     * @throws Exception
     */
    public function searchUsers($query){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call searchUsers().");
        }

        $request = new SearchUsersRequest($this, $query);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to searchUsers: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Search Facebook Places
     *
     * @param string $query Place to Search for
     * @return API\Response\PlacesFacebookSearchResponse
     * @throws Exception
     */
    public function searchFacebookPlaces($query){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call searchFacebookPlaces().");
        }

        $request = new PlacesFacebookSearchRequest($this);
        $request->searchByQuery($query);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to searchFacebookPlaces: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Search Facebook Places by Location
     *
     * @param string $latitude Latitude
     * @param string $longitude Longitude
     * @return API\Response\PlacesFacebookSearchResponse
     * @throws Exception
     */
    public function searchFacebookPlacesByLocation($latitude, $longitude){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call searchFacebookPlacesByLocation().");
        }

        $request = new PlacesFacebookSearchRequest($this);
        $request->searchByLocation($latitude, $longitude);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to searchFacebookPlacesByLocation: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Change Profile Picture
     *
     * @param string $path File path of Profile Picture to Upload
     * @return API\Response\ChangeProfilePictureAccountResponse
     * @throws Exception
     */
    public function changeProfilePicture($path){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call changeProfilePicture().");
        }

        $request = new ChangeProfilePictureAccountRequest($this, $path);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to changeProfilePicture: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Remove Profile Picture
     *
     * @return API\Response\ChangeProfilePictureAccountResponse
     * @throws Exception
     */
    public function removeProfilePicture(){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call removeProfilePicture().");
        }

        $request = new RemoveProfilePictureAccountRequest($this);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to removeProfilePicture: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Post Photo to Timeline
     *
     * @param string $path File path of Photo to Post
     * @param string $caption Caption for this Photo
     * @return API\Response\ConfigureMediaResponse
     * @throws Exception
     */
    public function postPhoto($path, $caption = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call postPhoto().");
        }

        $request = new PhotoUploadRequest($this, $path);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to Upload Photo: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        $request = new ConfigureMediaRequest($this, $response->getUploadId(), $path, $caption);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to Configure Media: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Edit Media
     *
     * @param string|API\Response\Model\FeedItem $mediaId FeedItem or FeedItem Id to Edit
     * @param string $caption Caption for this Media
     * @return API\Response\EditMediaResponse
     * @throws Exception
     */
    public function editMedia($mediaId, $caption = null){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call editMedia().");
        }

        if($mediaId instanceof FeedItem){
            $mediaId = $mediaId->getPk();
        }

        $request = new EditMediaRequest($this, $mediaId, $caption);
        $response = $request->execute();

        if(!$response->isOk()){
            throw new InstagramException(sprintf("Failed to editMedia: [%s] %s", $response->getStatus(), $response->getMessage()));
        }

        return $response;

    }

    /**
     *
     * Get User by Username
     *
     * @param string $username Username to find User by
     * @return API\Response\Model\User
     * @throws Exception
     */
    public function getUserByUsername($username){

        $searchResults = $this->searchUsers($username);
        $users = $searchResults->getUsers();

        foreach($users as $user){
            if($username == $user->getUsername()){
                return $user;
            }
        }

        throw new InstagramException("Failed to find User by Username");

    }

    /**
     *
     * Logout
     *
     * @return API\Response\LogoutResponse
     * @throws Exception
     */
    public function logout(){

        if(!$this->isLoggedIn()){
            throw new InstagramException("You must be logged in to call logout().");
        }

        $request = new LogoutRequest($this);
        return $request->execute();

    }

    public function ChallengeCode($url){
      $request = new ChallengeRequest($this, $url);
      return $request->execute();
    }

    public function GetChallengeMethods($url){
      $request = new ChallengeMethods($this, $url);
      return $request->execute();
    }

    public function sendVerificationCode($url, $method){
      $request = new Challenge_sendcode($this, $url, $method);
      return $request->execute();
    }

    public function ConfirmVerificationCode($url, $code){
      $request = new Challenge_confirm_code($this, $url, $code);
      return $request->execute();
    }

    public function SendVerificationCodeAgain($url, $replay){
      $request = new Challenge_sendcode_again($this, $url, $replay);
      return $request->execute();
    }


    public function GetSession($url){
      $request = new SaveSession($this, $url);
      return $request->execute();
    }

}
