<?php 
class Product extends Controller {

    private $modelProduct;

    function __construct()
    {
        $this->modelProduct = $this->model("ProductModel");
    }

    public function Index() {
        $list = $this->modelProduct->GetAllProduct();
        return $this->Views('Share/Layout', ['subview'=>"admin/Product", "list"=>$list]);
    }
    
    public function Create() {

    }

    public function Edit() {
        
    }

    public function Delete() {
        
    }
}
?>