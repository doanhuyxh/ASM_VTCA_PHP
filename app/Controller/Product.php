<?php

class Product extends Controller
{
    public function index()
    {
        echo "Danh sách sản phẩm";
    }

    public function list_product()
    {
        $products = $this->model("ProductModel");
        $data = $products->GetProductList();
        $this->Views("Product/list", $data);
    }
}

?>
