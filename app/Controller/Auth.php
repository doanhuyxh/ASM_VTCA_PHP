<?php
class Auth extends Controller
{
    protected $modelUser;

    function __construct()
    {
        $this->modelUser = $this->model("AuthModel");
    }

    public function Login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["UserName"];
            $password = $_POST["password"];            

            try {
                $data = $this->modelUser->GetUser($username, md5($password));                    
                if (isset($data[0])) {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;

                    header('Location: ' . _WEB_ROOT . '/trang-chu');
                } else {
                    session_destroy();                    
                    return $this->Views("Share/Layout", ['subview' => 'Auth/Login', 'error'=> '<p class="text-danger">Tài khoản hoặc mật khẩu không chính xác</p>', 'user'=> $username, 'pass'=> $password]);
                }
            } catch (Exception $ex) {
                session_destroy();
                return $this->Views("Share/Layout", ['subview' => 'Auth/Login', 'error'=> '<p class="text-danger">Tài khoản hoặc mật khẩu không chính xác</p>', 'user'=> $username, 'pass'=> $password]);
            }
        }

        return $this->Views("Share/Layout", ['subview' => 'Auth/Login']);
    }

    public function LogOut()
    {
        session_destroy();
        header('Location: ' . _WEB_ROOT . '/trang-chu');
    }

    public function Signin()
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
