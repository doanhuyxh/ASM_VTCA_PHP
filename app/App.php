<?php

class App
{
    private $__controller, $__action, $__param, $__routes;

    public function __construct()
    {
        global $routes;

        $this->__routes = new Route();

        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }
        $this->__action = "index";
        $this->__param = [];
        $this->handleUrl();
    }

    public function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER["PATH_INFO"];
        } else {
            $url = "/";
        }
        return $url;
    }

    public function handleUrl()
    {
        $url = $this->getUrl();
        $url = $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr);

        $urlCheck = '';
        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlCheck .= $item . '/';
                $fileCheck = rtrim($urlCheck, '/');
                $fileArr = explode('/', $fileCheck);
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);
                $fileCheck = implode('/', $fileArr);

                if (!empty($urlArr[$key - 1])) {
                    unset($urlArr[$key - 1]);
                }
                if (file_exists('app/Controller/' . ($fileCheck) . '.php')) {
                    $urlCheck = $fileCheck;
                    break;
                }
            }
            $urlArr = array_values($urlArr);
        }
        
        
        //xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
        } else {
           $this->__controller = ucfirst($this->__controller);
        }
        
        //gắn lại controller mặc định
        if (empty($urlCheck)) {
            $urlCheck = $this->__controller;
        }

        //Thêm file controller vào đây
        if (file_exists('app/Controller/' . $urlCheck . '.php')) {
            require_once 'Controller/' . $urlCheck . '.php';
            
            //Kiểm tra controller tồn tại
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
                unset($urlArr[0]);
            } else {
                $this->loadError();
            }
        } else {            
            $this->loadError();
        }
        
        //xử lý action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // xử lý param
        $this->__param = array_values($urlArr);

        //kiểm tra action tồn tại
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__param);
        } else {
            $this->loadError();
        }
    }

    public function loadError($name = '404')
    {
        require_once 'errors/' . $name . '.php';
    }
}
