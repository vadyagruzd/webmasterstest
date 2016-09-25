<?php
require_once (LANGUAGE_DIR . $lang . '/' . $lang .'.php');

class Test {
    
    private $model;
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }


    public function index($lang) {
        if(isset($_SESSION['username'])) {
            $model_file = './model/User_model.php';
            if(file_exists($model_file)) {
                require_once $model_file;
                $this->model = new User_model($this->db);
                
                $q = "SELECT * FROM `users` WHERE `username` = '" . $_SESSION['username'] . "'";
                $query = $this->db->prepare($q);
                $query->execute(); 
                $data = $query->fetch(PDO::FETCH_ASSOC);
                                
                $view = "./view/index_view.php";
                if(file_exists($view)) {
                    $page = view($view, $data, $lang);
                }
            }
             
            return $page;
        }
        else $page = false;
    }
    
    public function login($lang) {
        if(!isset($_SESSION['username'])) {
            $model_file = './model/User_model.php';
            if(file_exists($model_file)) {
                require_once $model_file;
                $this->model = new User_model($this->db);

                if(!empty($_POST)) {
                    if($this->model->login($_POST)){
                        $http_string = $_SERVER['SERVER_NAME'];
                        header("Location: http://$http_string/$lang");
                    }
                    else
                        $data['error'] = lang_login_error;
                }

                $view = "./view/login.php";
                if(file_exists($view)) {
                    $page = view($view, $data, $lang);
                }
            } else $page = lang_some_error;

            return $page;
        } else {
            $http_string = $_SERVER['SERVER_NAME'];
            header("Location: http://$http_string/$lang");
        }
    }
    
    public function logout($lang) {
        $model_file = './model/User_model.php';
        if(file_exists($model_file)) {
            require_once $model_file;
            $this->model = new User_model($this->db);
            if($this->model->logout()){
                $http_string = $_SERVER['SERVER_NAME'];
                header("Location: http://$http_string/$lang");
            }
            else
                die(lang_logout_error);
        } else $page = lang_some_error;
        
        return $page;
    }
    
    public function register($lang) {
        if(!isset($_SESSION['username'])) {
            $model_file = './model/User_model.php';
            if(file_exists($model_file)) {
                require_once $model_file;
                $this->model = new User_model($this->db);
                
                if(!empty($_POST)) {
                    $error = $this->model->register($_POST);
                    if(count($error) <= 0){
                        $this->model->login($_POST);
                        $http_string = $_SERVER['SERVER_NAME'];
                        header("Location: http://$http_string/$lang");
                    }
                    else
                        $data['error'] = $error;
                }

                $view = "./view/register.php";
                if(file_exists($view)) {
                    $page = view($view, $data, $lang);
                }
            } else $page = lang_some_error;

            return $page;
        } else {
            $http_string = $_SERVER['SERVER_NAME'];
            header("Location: http://$http_string/$lang");
        }
    }
}