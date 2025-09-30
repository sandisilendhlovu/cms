<?php
/**
 * Authentication
 * Login and Logout
 */

class Auth
{   
    /**
     *  Return the user authentiication status
     * @return boolean True if is logged in, false otherwise
     * 
     */
    public static function isLoggedIn()
    {
        return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
    }
    
    /**
     * Require the user to be logged in, stopped with an unauthorised message if not 
     * 
     */


    public static function requireLogin()
    {
        if (! static::isLoggedin()) {
            die("Please log in to view and manage articles");
        }
    }
    /**
     * Log in using the session
     * @return void
     */

    public static function login()
{
    session_regenerate_id(true);

    $_SESSION['is_logged_in'] = true;
}


/**
 * Logout using the session
 * @return void
 */


    public static function logout()
    
    {
        
$_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();


    }


}