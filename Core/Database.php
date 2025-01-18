<?php

class Database
{
    const HOST = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DBNAME = 'php_mvc';

    public function connect()
    {
        $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME);

        mysqli_set_charset($connect, "utf8");

        if (mysqli_connect_errno() === 0) {
            return $connect;
        }

        return false;
    }
}
