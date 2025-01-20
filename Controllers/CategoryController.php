<?php

class CategoryController extends BaseController
{

    private $categoryModel;

    public function __construct()
    {
        $this->loadModel("CategoryModel");
        $this->categoryModel = new CategoryModel;
    }

    public function index()
    {
       $categories = $this->categoryModel->all('categories');

       $this->view("categories.index", ["categories" => $categories]);
    }

    public function show()
    {
        echo 'product show';
    }
}
