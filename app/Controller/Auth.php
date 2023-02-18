<?php
class Auth extends Controller
{
    protected $modelUser;

    function __construct()
    {
        $this->modelUser = $this->model("AuthModel");
    }

    public function LogIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["UserName"];
            $password = $_POST["password"];
            $password = md5($password);



            $data = $this->modelUser->GetUser($username, $password);
            var_dump($data);
            echo "data tra ra tu model: " . isset($data);
            die;

            if (isset($data)) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                return $this->Views("Share/Layout", ['subview' => 'Product/Index']);
            } else {
                return $this->Views("Share/Layout", ['subview' => 'Auth/LogIn']);
            }
        }

        return $this->Views("Share/Layout", ['subview' => 'Auth/LogIn']);
    }

    public function LogOut()
    {
        session_destroy();
        header('Location: ' . _WEB_ROOT . '/trang-chu');
    }

    public function SignIn()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["Email"];
            $username = $_POST["UserName"];
            $password = $_POST["password"];

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            $this->modelUser->createUser($email, $username, $password);

            return $this->Views("Share/Layout", ['subview' => 'Product/Index']);
        } else {
            return $this->Views("Share/Layout", ['subview' => 'Auth/SignIn']);
        }
    }

    public function CheckExits()
    {
        $user =  $_GET['user'];
        $data =  $this->modelUser->CheckExit($user);
        echo json_encode($data);
        die;
    }
}
