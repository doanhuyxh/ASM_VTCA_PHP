<?php

class Home extends Controller
{
    private $product_model;

    public function index()
    {
        return $this->Views("Share/Layout", ['subview'=> 'Product/index']);
    }
    
    public function detail()
    {
        return $this->Views("Share/Layout", ['subview'=> "Product/detail"]);
    }
}
