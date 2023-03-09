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

            try{
            $this->modelProduct->Create($code, $name, $price, $cate);
            header('Location: ' . _WEB_ROOT . '/admin-product');
            }
            catch (Exception $ex) {
                echo $ex;
                header('Location: ' . _WEB_ROOT . '/admin-product');
            }   
        }
        header('Location: ' . _WEB_ROOT . '/admin-product');
    }

    public function Edit() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $code = $_POST["code"];
            $name = $_POST["name"];
            $cate = $_POST["cate"];
            $price = $_POST["price"];
            $id = $_POST['id'];
            try{
            $this->modelProduct->Edit($code, $name, $price, $cate, $id);
            }
            catch (Exception $ex) {
                echo $ex;
            }   
            finally {
                header('Location: ' . _WEB_ROOT . '/admin-product');
            }
        }
    }

    public function Delete() {
        $id = $_GET['id'];
        try {
            $this->modelProduct->Delete($id);
        }
        catch (Exception $ex) {
            echo $ex;
        }  
    }

    public function GetAllProduct() {
        $list = $this->modelProduct->GetAllProduct();
        header("Content-Type: application/json");
        echo json_encode($list, \JSON_UNESCAPED_UNICODE);
        exit();
    }

    public function GetProductById() {
        $id = $_GET['id'];
        $result = $this->modelProduct->GetById($id);
        echo json_encode($result, \JSON_UNESCAPED_UNICODE);
        die;
    }
}
?>