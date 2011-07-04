<?php

class Jedarchive_Auth extends Jedarchive_Base 
{
    public function __construct()
    {
        $this->_passwd = $this->readHtpasswd(APPLICATION_PATH . '/' . $this->config()->getSetting('htpasswd_location'));
    }

    public function authenticate()
    {
        if (!isset($_SERVER['PHP_AUTH_USER']) ||
            !$this->validate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])
        ) {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'You are unatuhorized to access this section of the website.';
            die();
        } 
    }

    public function readHtpasswd($file)
    {
        $result = array();

        if(file_exists($file) && is_readable($file) && $handle=fopen($file,'r')) {
            while ($line = preg_replace('`[\r\n]$`', '', fgets($handle))) {
                list($fuser,$fpass) = explode(':',$line);
                $result[$fuser] = $fpass;
            }
            fclose($handle);
        }
        
        return $result;
    }

    protected function validate($user, $pwd, $cryptType = 'DES')
    {
        if (isset($this->_passwd[$user])) {
            $htPwd = $this->_passwd[$user];

            switch ($cryptType) {
            case 'DES':
                // the salt is the first 2
                // characters for DES encryption
                $salt = substr($htPwd,0,2);
                
                // use the salt to encode the
                // submitted password
                $testPwd = crypt($pwd, $salt);
                break;
            case 'PLAIN':
                $testPwd = $pass;
                break;
            }
            return $testPwd == $htPwd;
        }
        return false;
    }
}
