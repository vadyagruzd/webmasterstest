<?php

class User_model {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function login($param) {
        if(!empty($param)) {
            $q = "SELECT * FROM `users` WHERE username = '" . $param['login'] . "' AND password = MD5('" . $param['password']."')";
            $query = $this->db->prepare($q);
            $query->execute(); 
            $result = $query->rowCount();
            if($result) {
                session_start();
                $_SESSION['username'] = $param['login'];
            }
        } else $result = false;
        
        return $result;
    }
    
    public function logout() {
        return session_destroy();
    }
    
    public function register($param) {        
        if(!empty($param)) {
            $q = "SELECT * FROM `users` WHERE username = '" . $param['login'] . "'";
            $query = $this->db->prepare($q);
            $query->execute(); 
            $result = $query->rowCount();
                
            if($result || (strlen($param['login']) < 5 && strlen($param['login']) > 15))
                if($result) $errors[] = lang_error_login_occupied;
                else $errors[] = lang_error_login_incorrect;
            
            if(strlen($param['password']) < 5 && strlen($param['password'])> 31)
                $errors[] = lang_error_password_incorrect;
            
            if($param['password'] != $param['password-confirm'])
                $errors[] = lang_error_password_match;
            
            $q = "SELECT * FROM `users` WHERE email = '" . $param['email'] . "'";
            $query = $this->db->prepare($q);
            $query->execute(); 
            $result = $query->rowCount();
            if($result || (strlen($param['email']) < 5 && strlen($param['email']) > 29 && filter_var($param['email'], FILTER_VALIDATE_EMAIL)))
                if($result) $errors[] = lang_error_email_occupied;
                else $errors[] = lang_error_email_incorrect;
            
            if(strlen($param['firstname']) < 3 && strlen($param['password'])> 15)
                $errors[] = lang_error_firstname_incorrect;
            
            if(strlen($param['lastname']) < 3 && strlen($param['lastname'])> 15)
                $errors[] = lang_error_lastname_incorrect;
            
            if($_FILES['avatar']['name']){
                $uploadfile = upload_dir . basename($_FILES['avatar']['name']);
                $filename = $_FILES['avatar']['tmp_name'];
                if (!move_uploaded_file($filename, $uploadfile)) 				
                    $errors[] = lang_error_image_incorrect;
            }
            
            if(count($errors) <= 0){
                $q = ("INSERT INTO `webmasterstest`.`users` (`id`, `username`, `password`, `email`, `firstname`, "
                        . "`lastname`, `birthdate`, `photopath`) VALUES (NULL, '". $param['login'] ."', MD5('"
                        . $param['password'] . "'), '" . $param['email'] . "', '" . $param['firstname']  
                        . "', '" . $param['lastname'] . "', '" . $param['birthdate'] . "', '" . basename($_FILES['avatar']['name']) . "')");
                $query = $this->db->prepare($q);
                
               
                $query->execute(); 
                
            }
        } else $errors = lang_some_big_error;
        
        return $errors;        
    }
}