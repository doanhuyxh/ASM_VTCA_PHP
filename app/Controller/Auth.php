<?php
class Auth extends Controller
{
    public function LogIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {            
            $username = $_POST["UserName"];
            $password = $_POST["password"];
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            return $this->Views("Share/Layout", ['subview' => 'Product/Index']);

        }

        return $this->Views("Share/Layout", ['subview' => 'Auth/LogIn']);
    }

    public function LogOut()
    {
        session_destroy();
        header('Location: http://localhost:81/ASM_PHP_VTCA/trang-chu');
    }

    public function SignIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["Email"];
            $username = $_POST["UserName"];
            $password = $_POST["password"];

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

//            $this->$model;
            
            return $this->Views("Share/Layout", ['subview' => 'Product/Index']);
        } else {
            return $this->Views("Share/Layout", ['subview' => 'Auth/SignIn']);
        }
    }

    public function CheckExits() {
        $user =  $_GET['user'];
        if ($user == 'doanhuyxh') {
            echo json_encode("doanhuyxh");
        }
        
    }
}
