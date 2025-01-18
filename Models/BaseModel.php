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

        if($orderByString) {
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

    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
}
