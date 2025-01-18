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
        $product = $this->productModel->findById(1);

        $this->view("products.show", ["product" => $product]);
    }

    public function create() {}

    public function store() {}

    public function edit() {}

    public function update() {}

    public function delete() {}
}
