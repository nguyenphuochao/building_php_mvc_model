<?php
class ProductModel extends BaseModel
{
    const TABLE = "products";

    public function getAll($select = ['*'], $orderBy = [], $limit = 15)
    {
       return $this->all(self::TABLE, $select, $orderBy, $limit);
    }

    public function findById($id)
    {
        $product = [
            "id" => 1,
            "name" => "Iphone"
        ];

        return $product;
    }

    public function delete() {}
}
