
<?php error_reporting(E_ALL); ini_set('display_errors', 1); ?>


<?php


/**
 * Database
 * A connection to the database
 */

Class Database 
{
    public function getConn()

{

    /**
     * Get the database connection
     * 
     * @return PDO object connectionto the database server
     */
        
     $db_host = "localhost";
     $db_name = "cms";
     $db_user = "cms_www";
     $db_pass = "1iVeE.Pzang04Q74";

     $dsn = 'mysql:host=' . $db_host . ';dbname=' .$db_name . ';charset=utf8' ;

    
    try {

     $db = new PDO($dsn, $db_user, $db_pass);

     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     return $db;

    } catch (PDOexception $e) {
    
    echo $e->getMessage();
    exit;

    }
}

}

