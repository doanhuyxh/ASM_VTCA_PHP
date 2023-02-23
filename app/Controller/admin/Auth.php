<?php
class Auth extends Controller
{
    private $modelAdmin;

    function __construct()
    {
        $this->modelAdmin = $this->model("adminModel");
    }

    public function Login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["UserName"];
            $password = $_POST["password"];

            try {
                $data = $this->modelAdmin->GetAdmin($username, md5($password));
                if (isset($data[0])) {
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;

                    header('Location: ' . _WEB_ROOT . '/admin-product');
                } else {
                    session_destroy();
                    return $this->Views("Share/Layout", ['subview' => 'admin/Login', 'error' => true, 'user' => $username, 'pass' => $password]);
                }
            } catch (Exception $ex) {
                session_destroy();
                return $this->Views("Share/Layout", ['subview' => 'admin/Login', 'error' => true, 'user' => $username, 'pass' => $password]);
            }
        }

        return $this->Views("Share/Layout", ['subview' => 'admin/Login']);
    }

    public function Logout()
    {
        session_destroy();
        header('Location: ' . _WEB_ROOT . '/trang-chu');
    }
}
