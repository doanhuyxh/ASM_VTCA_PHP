<?php

class Model
{
    protected $connection;

    function __construct()
    {

        try {
            $connection = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASS_WORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            die("Lỗi kết nối cơ sở dữ liệu: " . $ex->getMessage());
        };
    }
}
