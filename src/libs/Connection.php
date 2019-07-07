<?php

class Connection extends PDO{

    private  static $instance = null;

    private function __construct() {
        parent::__construct('mysql:host='.host.';dbname='.default_schema.';', 
        user, password);
    }

    public static function singleton() : Connection {
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }

        return self::$instance;
    }

    # closes the database connection when object is destroyed.
    public function __destruct() {
        $this->connection = null;
    }

}
?>
