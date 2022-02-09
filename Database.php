<?php


class Database
{
    const DBSERVER = 'localhost';
    const DBUSERNAME = 'root';
    const DBPASSWORD = '';
    const DBNAME = 'employees';

    public static function dbConnect()
    {
        return mysqli_connect(self::DBSERVER, self::DBUSERNAME, self::DBPASSWORD, self::DBNAME);
    }
}