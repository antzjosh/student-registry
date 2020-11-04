<?php

class DAO
{
	protected $cn;
    protected $UserID;
    protected $Password;

	protected function openDB($UserName,$Password){
        $dbhost = DB_HOST;
        $dbname = DATABASE;
        //echo 'Came through openDB()';
            try
            {
                $this->cn = new PDO("mysql:host=$dbhost;dbname=$dbname", $UserName, $Password);
                $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $connResult=1;
            }

            catch(PDOException $e)
            {
			    $connResult=0;
            //exit();
        }
        //echo "Connection Result: $connResult";
        return $connResult;
    }
}
?>
