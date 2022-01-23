<?php

require_once('config.php');

class DBConnector
{
    //Соединение с БД
    private static $connect = null;
    //Последний добавленный id
    private static $lastId = 0;

    public static function conn_to_db()
    {
        $user = DB_USERNAME;
        $pass = DB_PASSWORD;
        $host = DB_HOSTNAME;
        $db = DB_DATABASE;
        $conn = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return $conn;
    }

    //Запрос к базе данных
    static function query($query, $skipLog = 0)
    {
        if (self::$connect == null) {
            self::$connect = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if (self::$connect->connect_errno) {
                die('База данных не доступна');
            }
        }
        $res = self::$connect->query($query);
        return $res;
    }

    static function insertArr($table, $arr, $skipLog = 0)
    {
        $sql = "INSERT INTO `$table` ";
        //Экранируем переменные массива
        foreach ($arr as $key => $val) {
            $val = self::$connect->mysqli_escape_string($val);
        }
        $sql .= "(`" . implode("`,`", array_keys($arr)) . "`) VALUES ('" . implode("','", array_values($arr)) . "')";
        self::query($sql, $skipLog);
        return self::insertId();
    }

    //Возвращает id последней добавленной записи
    static function insertId()
    {
        return self::$lastId;
    }

    static function insert($query)
    {
        self::query($query);
        //Возвращает id последней добавленной записи
        return self::insertId();
    }

    static function selectCell($query)
    {
        $row = self::selectRow($query);
        if ($row) {
            return reset($row);
        }
    }

    static function selectRow($query)
    {
        $res = self::select($query);
        if ($res) {
            return reset($res);
        }
    }

    static function select($query)
    {
        $res = self::query($query);
        $mas = array();
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                if ($row['ARRAY_KEY']) {
                    $key = $row['ARRAY_KEY'];
                    unset($row['ARRAY_KEY']);
                    $mas[$key] = $row;
                } else {
                    $mas[] = $row;
                }
            }
            return $mas;
        }
    }

    static function update($table, $mass, $id)
    {
        $sql = "UPDATE `$table` SET ";
        foreach ($mass as $key => $it) {
            $it = self::$connect->mysqli_escape_string($it);
            $sql .= " $key='$it',";
        }
        $sql = substr($sql, 0, -1);
        $sql .= " where id = $id";
        return self::query($sql);
    }
}