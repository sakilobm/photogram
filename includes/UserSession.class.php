<?php

use UserSession as GlobalUserSession;

class UserSession
{
    /**
     * This function return a session ID if username and password is correct.
     *
     * @param [type] $username
     * @param [type] $password
     * @return SessionID
     */
    public static function authenticate($user, $pass)
    {
        $username = User::login($user, $pass);
        $user = new User($username);
        if ($username) {
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 9999999).$ip.$agent.time());
            $sql = "INSERT INTO `session` (`uid`, `token`, `login_active`, `ip`, `user_agent`, `active`)
            VALUES ('$user->id', '$token', now(), '$ip', $agent, '1');";
            if ($conn->query($sql)) {
                Session::set('session_token', $token);
                return $token;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function authorize($token)
    {
        $sess = new GlobalUserSession($token);
    }
    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $this->token = $token;
        $this->data = null;
        $sql = "SELECT * FROM `session` WHERE `token` = '$token' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid']; //Updating this from database
        } else {
            throw new Exception("Session is invalid");
        }
    }

    public function getUser()
    {
        return new User($this->uid);
    }
    /**
     * Check if the validity of the session is within one hour, else it inactive
     *
     * @return boolean
     */
    public function isValid()
    {
        
    }
    public function getIp()
    {
        
    }
    public function getUserAgent()
    {
        
    }
    public function deactivate()
    {
        
    }
}
