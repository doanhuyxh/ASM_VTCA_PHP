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

            try {
                $data = $this->modelUser->GetUser($username, $password);                    
                if (isset($data[0])) {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;

                    header('Location: ' . _WEB_ROOT . '/trang-chu');
                } else {
                    session_destroy();                    
                    return $this->Views("Share/Layout", ['subview' => 'Auth/LogIn', 'error'=> '<p class="text-danger">Tài khoản hoặc mật khẩu không chính xác</p>', 'user'=> $username, 'pass'=> $password]);
                }
            } catch (Exception $ex) {
                session_destroy();
                return $this->Views("Share/Layout", ['subview' => 'Auth/LogIn', 'error'=> '<p class="text-danger">Tài khoản hoặc mật khẩu không chính xác</p>', 'user'=> $username, 'pass'=> $password]);
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
