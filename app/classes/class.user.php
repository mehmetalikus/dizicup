<?php 

class User
{
    private $userId;
    private $userName;
    private $userUrl;
    private $userEmail;
    private $userCreatedAt;
    private $userBirthDate;
    private $userSummary;
    private $userImage;


    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
        return $this;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setUserName($userName){
        $this->userName = $userName;
        return $this;
    }

    public function getUserUrl(){
        return $this->userUrl;
    }

    public function setUserUrl($userUrl){
        $this->userUrl = $userUrl;
        return $this;
    }

    public function getUserEmail(){
        return $this->userEmail;
    }

    public function setUserEmail($userEmail){
        $this->userEmail = $userEmail;
        return $this;
    }

    public function getUserCreatedAt(){
        return $this->userCreatedAt;
    }

    public function setUserCreatedAt($userCreatedAt){
        $this->userCreatedAt = $userCreatedAt;
        return $this;
    }

    public function getUserBirthDate()
    {
        return $this->userBirthDate;
    }

    public function setUserBirthDate($userBirthDate)
    {
        $this->userBirthDate = $userBirthDate;
        return $this;
    }

    public function getUserSummary()
    {
        return $this->userSummary;
    }

    public function setUserSummary($userSummary)
    {
        $this->userSummary = $userSummary;
        return $this;
    }

    public function getUserImage()
    {
        return $this->userImage;
    }

    public function setUserImage($userImage)
    {
        $this->userImage = $userImage;
        return $this;
    }
    

    public function userFromURL($userUrl, $conn)
    {
        $query = $conn->prepare("
            SELECT u.UserId, u.UserName, u.UserEmail, u.createdAt, u.UserURL, ui.userBirthDate, ui.userSummary, ui.userProfileImage
            FROM users u
            INNER JOIN users_info ui ON ui.userId = u.userId
            WHERE u.UserURL = :url
        ");
        $query->bindValue(":url", $userUrl);
        if($query->execute() && $query->rowCount() > 0){
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            $conn = null;

            $this->setUserId($data["UserId"]);
            $this->setUserName($data["UserName"]);
            $this->setUserEmail($data["UserEmail"]);
            $this->setUserCreatedAt($data["createdAt"]);
            $this->setUserUrl($data["UserURL"]);
            $this->setUserBirthDate($data["userBirthDate"]);
            $this->setUserSummary($data["userSummary"]);
            $this->setUserImage($data["userProfileImage"]);
        }
        else
            return false;
    }

    public function userFromID($userId, $conn)
    {
        $query = $conn->prepare("
            SELECT u.UserId, u.UserName, u.UserEmail, u.createdAt, u.UserURL, ui.userBirthDate, ui.userSummary, ui.userProfileImage
            FROM users u
            INNER JOIN users_info ui ON ui.userId = u.userId 
            WHERE u.UserId = :id
        ");
        $query->bindValue(":id", $userId);
        if($query->execute() && $query->rowCount() > 0){
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            $conn = null;

            $this->setUserId($data["UserId"]);
            $this->setUserName($data["UserName"]);
            $this->setUserEmail($data["UserEmail"]);
            $this->setUserCreatedAt($data["createdAt"]);
            $this->setUserUrl($data["UserURL"]);
            $this->setUserBirthDate($data["userBirthDate"]);
            $this->setUserSummary($data["userSummary"]);
            $this->setUserImage($data["userProfileImage"]);
        }
        else
            return false;
    }

    public static function watchLog($userId, $conn)
    {
        $query = $conn->prepare("
            SELECT s.SeriesName, se.EpisodeName, se.EpisodeSeason, se.EpisodeChapter
            FROM series s
            INNER JOIN series_episodes se ON se.SeriesID = s.SeriesId
            INNER JOIN watch_log wl ON wl.episodeId = se.EpisodeId
            INNER JOIN users u ON u.UserId = wl.userId
            WHERE u.UserId = :u_id
        ");
        $query->bindValue(":u_id", $userId);
        if($query->execute() && $query->rowCount() > 0){
            $conn = null;
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
            return false;
    }
}
