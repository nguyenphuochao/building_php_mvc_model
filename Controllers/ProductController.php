<?php

class ProductController extends BaseController
{
    private $productModel;

    public function __construct()
    {
        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        $selectColumns = ['id', 'name', 'price'];
        $orders = [
            'column' => 'id',
            'order'  => 'desc'
        ];

        $products = $this->productModel->getAll($selectColumns, $orders);

        $this->view("products.index", ["products" => $products]);
    }

    public function show()
    {
        $id = $_GET["id"];
        $product = $this->productModel->findById($id);

        $this->view("products.show", ["product" => $product]);
    }

    public function create() {}

    public function store()
    {
        $data = [
            "name" => "OPPO 1",
            "price" => 20000,
            "image" => null,
            "category_id" => 4
        ];

        $this->productModel->store($data);
    }

    public function edit() {}

    public function update()
    {
        $id = $_GET["id"];

        $data = [
            "name" => "OPPO 100",
            "price" => 20000,
            "image" => null,
            "category_id" => 4
        ];

        $this->productModel->updateData($id, $data);
    }

    public function delete() {}
}
