<?php

class BaseModel extends Database
{

    protected $connect;

    public function __construct()
    {
        $this->connect = $this->connect(); // kết nối DB
    }

    public function all($table, $select = ['*'], $orderBys = [], $litmit = 15)
    {
        $columns = implode(',', $select);
        $orderByString = implode(' ', $orderBys);

        if ($orderByString) {
            $sql = "SELECT {$columns} FROM {$table} ORDER BY {$orderByString} LIMIT {$litmit}";
        } else {
            $sql = "SELECT {$columns} FROM {$table} LIMIT {$litmit}";
        }
        $query = $this->_query($sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            array_push($data, $row);
        }

        return $data;
    }

    public function find($table, $id)
    {
        $sql = "SELECT * FROM {$table} WHERE id = {$id} LIMIT 1";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function create($table, $data = [])
    {
        $columns = implode(',', array_keys($data));
        $newValues = array_map(function ($value) {
            return "'" . $value . "'";
        }, array_values($data));

        $newValues = implode(',', $newValues);

        $sql = "INSERT INTO {$table}({$columns}) VALUES ({$newValues})";
        $this->_query($sql);
    }

    public function update($table, $id, $data)
    {
        $dataSets = [];
        foreach ($data as $key => $val) {
            array_push($dataSets, "$key = '" . $val . "'");
        }

        $dataSetString = implode(',', $dataSets);

        $sql = "UPDATE {$table} SET {$dataSetString}  WHERE id = {$id}";
        $this->_query($sql);
    }

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
