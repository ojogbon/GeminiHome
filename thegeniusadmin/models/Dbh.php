<?php
include_once "DbHandler.php";
    class Dbh extends DbHandler
    {
        protected $servername;
        protected $username;
        protected $password;
        protected $dbname;
        protected $charset;

        public function dbConnect()
        {

            $this->servername = $server__ ;
            $this->username = $username__;
            $this->password = $password__;
            $this->dbname = $dbname__;
            $this->charset = "utf8mb4";


            try {
                $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Connection Failed: ".$e->getMessage();
            }
        }
    }

?>
