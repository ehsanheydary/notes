<?php


class DB
{
    private $connection;
    private static $db;

    private function __construct($option = null)
    {
        if ($option != null):
            $host = $option['host'];
            $user = $option['user'];
            $pass = $option['pass'];
            $db = $option['db'];
        else:
            global $config;
            $host = $config['host'];
            $user = $config['user'];
            $pass = $config['pass'];
            $db = $config['db'];
        endif;
        $this->connection = new mysqli($host , $user , $pass , $db);

        if($this->connection->connect_error):
            var_dump('hello');
            echo "Connection to database failed : " . $this->connection->connect_error;
            exit();
        endif;

        $this->connection->query("SET NAMES UTF8");
//        mysqli_set_charset()

    }

    public static function GetDbInstance()
    {
        if (self::$db == null):
            self::$db = new DB();
        endif;
        return self::$db;
    }
    public function FirstSelect($sqlquery){
        $records = $this->SelectQuery($sqlquery);
        if (empty($records))
        {
            return null;
        }
        return $records[0];
}
    public function SelectQuery($sqlquery){

        $result = $this->connection->query($sqlquery);
        $record  = array();

        if($result->num_rows == 0):
            return null;
        endif;
            while ($row = $result->fetch_assoc()):
                $record[] = $row;
            endwhile;

        return $record;

    }
    public function InsertQuery($sqlquery)
    {
        $id = $this->connection->query($sqlquery);
        return $id;
    }
    public function UpdateQuery($sqlquery){

        $this->connection->query($sqlquery);

    }
    public function DeleteQuery($sqlquery){

        $this->connection->query($sqlquery);

    }
    public function Connect()
    {
        return $this->connection;
    }
    public function Close()
    {
        $this->connection->close();
    }
}