<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/helper.util.php");
require($_SERVER['DOCUMENT_ROOT'] . "/src/utils/validator.utils.php");

class DB
{
    private static $connect = null;
    private static $query = '';
    private static $arrayValueParam = [];
    public static function getConnection()
    {

        $selfAttr = Helper::env('db');
        $host = $selfAttr['host'] ?? 'localhost';
        $port = $selfAttr['port'] ?? 3306;
        $user = $selfAttr['user'] ?? 'root';
        $password = $selfAttr['password'] ?? '';
        $dbname = $selfAttr['dbname'] ?? 'myproject';
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        try {
            self::$connect = null;
            self::$connect = new PDO($dsn, $user, $password);
            self::$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            self::$connect = null;
            throw new CustomException($e->getMessage(), $e->getCode(), $e);
        }
    }
    public static function close()
    {
        try {
            if (self::$connect != null) {
                self::$connect = null;
            }
        } catch (PDOException $e) {
            self::$connect = null;
            throw new CustomException($e->getMessage(), $e->getCode(), $e);
        }
    }
    public static function query($sql)
    {
        $result = null;
        try {
            self::getConnection();
            $stmt = self::$connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            self::close();
            self::$query = '';
            throw new CustomException($e->getMessage(), $e->getCode(), $e);
        } finally {
            self::$query = '';
            self::close();
        }
        return $result;
    }
    public function execute()
    {
        echo DB::$query;
        try {
            DB::getConnection();
            if (DB::$connect != null && is_string(DB::$query) && strlen(DB::$query) > 0) {
                $stmt = DB::$connect->prepare(DB::$query);
                if (!empty(DB::$arrayValueParam)) {
                    foreach (DB::$arrayValueParam[0] as $obj) {
                        $stmt->bindParam(':' . $obj['index'], $obj['value']);
                    }
                    DB::$arrayValueParam = [];
                }
                $stmt->execute();
                $stmt->closeCursor();
            }
        } catch (PDOException $e) {
            DB::close();
            DB::$query = '';
            throw new CustomException($e->getMessage(), $e->getCode(), $e);
        } finally {
            DB::$query = '';
            DB::close();
        }
    }
    public  function getMany()
    {
        $result = null;
        try {
            DB::getConnection();
            if (DB::$connect != null && is_string(DB::$query) && strlen(DB::$query) > 0) {
                $stmt = DB::$connect->prepare(DB::$query);
                if (!empty(DB::$arrayValueParam)) {
                    foreach (DB::$arrayValueParam as $obj) {
                        $stmt->bindParam($obj['index'], $obj["value"]);
                    }
                    DB::$arrayValueParam = [];
                }
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
            }
        } catch (PDOException $e) {
            DB::close();
            DB::$query = '';
            throw new CustomException($e->getMessage(), $e->getCode(), $e);
        } finally {
            DB::$query = '';
            DB::close();
        }
        return $result;
    }
    public function getOne()
    {
        return $this->getMany()[0];
    }
    public  function groupBy($byGroup)
    {
        $query = DB::$query;
        DB::$query = $query . ' GROUP BY ' . $byGroup;
        return $this;
    }
    public  function skip(int $skip)
    {
        $query = DB::$query;
        DB::$query = $query . ' OFFSET ' . $skip;
        return $this;
    }
    public  function take(int $take)
    {
        $query = DB::$query;
        DB::$query = $query . ' LIMIT ' . $take;
        return $this;
    }
    public  function andWhere($condition, $operator, $value)
    {
        $query = DB::$query;
        DB::$query = $query . ' AND ' . $condition . $operator . ':' . $condition;
        array_push(DB::$arrayValueParam, ["index" => $condition, "value" => $value]);
        return $this;
    }
    public  function where($condition, $operator, $value)
    {
        $query = DB::$query;
        DB::$query = $query . ' WHERE ' . $condition . $operator . ':' . $condition;
        array_push(DB::$arrayValueParam, ["index" => $condition, "value" => $value]);
        return $this;
    }
    public function join($table,  $condition)
    {
        $query = DB::$query;
        DB::$query = $query . ' JOIN ' . $table . ' ON ' . $condition;
        return $this;
    }
    public  function from($table)
    {
        $query = DB::$query;
        DB::$query = $query . ' FROM ' . $table;
        return $this;
    }
    public static function select($attr)
    {
        DB::$query = 'SELECT ' . $attr;
        return new self();
    }
    public static function update($table)
    {
        DB::$query = 'UPDATE ' . $table;
        return new self();
    }
    public function set($attr, $value)
    {
        DB::$query = 'SET ' . $attr . '=:' . $attr;
        array_push(DB::$arrayValueParam, ["index" => $attr, "value" => $value]);
        return $this;
    }
    public function andSet($attr, $value)
    {
        DB::$query = ',' . $attr . '=:' . $attr;
        array_push(DB::$arrayValueParam, ["index" => $attr, "value" => $value]);
        return $this;
    }
    public static function delete($table, $id)
    {
        self::$query = 'DELETE FROM ' . $table . ' WHERE id:=id';
        array_push(self::$arrayValueParam, ["index" => 'id', "value" => $id]);
        return new self();
    }
    public static function save($table, array $values)
    {
        $keys = array_keys($values);
        $attr = '';
        $value = '';
        for ($i = 0; $i < count($keys); $i++) {
            if ($i == 0) {
                $attr = $keys[$i];
                $value = ':' . $keys[$i];
                continue;
            }
            $attr = $attr . ',' . $keys[$i];
            $value = $value . ',:' . $keys[$i];
        }

        self::$query = 'INSERT INTO ' . $table . '(' . $attr . ')' . ' VALUES (' . $value . ')';
        $arrayParam = [];
        for ($i = 0; $i < count($keys); $i++) {
            array_push($arrayParam, ["index" => $keys[$i], "value" => $values[$keys[$i]]]);
        }
        array_push(self::$arrayValueParam, $arrayParam);
        return new self();
    }
    public static function save_update($table, $id, array $values)
    {
        $attr = '';
        $keys = array_keys($values);
        for ($i = 0; $i < count($keys); $i++) {
            if ($i == 0) {
                $attr = $keys[$i] . '=:' . $keys[$i];
                continue;
            }
            $attr = $attr . ' , ' . $keys[$i] . '=:' . $keys[$i];
        }
        self::$query = 'UPDATE FROM ' . $table . 'SET ' . $attr . ' WHERE id = :id';
        $arrayParam = [];
        array_push($arrayParam, ["index" => 'id', "value" => $id]);
        for ($i = 0; $i < count($keys); $i++) {
            array_push($arrayParam, ["index" => $keys[$i], "value" => $values[$keys[$i]]]);
        }
        array_push(self::$arrayValueParam, $arrayParam);
        return new self();
    }
}
