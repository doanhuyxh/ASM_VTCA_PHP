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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $cate = $_POST["cate"];
            $price = $_POST["price"];
            
            $this->modelProduct->Create($code, $name, $price, $cate);
            
            echo "đã vào đây";
            die;

            

            $this->Index();
        }

        echo "adadasda";
            die;
    }

    public function Edit() {
        
    }

    public function Delete() {
        
    }

    public function GetAllProduct() {
        $list = $this->modelProduct->GetAllProduct();
        header("Content-Type: application/json");
        echo json_encode($list, \JSON_UNESCAPED_UNICODE);
        exit();
    }
}
?>