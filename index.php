<?php
    header('Content-Type: text/html; charset=utf-8');
    require_once 'config.php';
    require_once 'functions.php';
    require_once 'config/database.php';
    require_once 'config/routes.php';
    require_once (LANGUAGE_DIR . $lang . '/' . $lang .'.php');
?>   


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://<?php echo root_addres; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://<?php echo root_addres; ?>/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        
    <title>WebMastersTest</title>
</head>
<body>
    <div class="container-fluid bg-info">
        <div class="container page-header">
            <div class="text-left col-md-2">
                <a href="http://<?php echo root_addres ."/us/".$route['method']?>"><img src="http://<?php echo root_addres;  ?>/files/flag-usa.png" /></a>
                <a href="http://<?php echo root_addres ."/ru/".$route['method']?>"><img src="http://<?php echo root_addres;  ?>/files/flag-russia.png" /></a>
            </div>
            <div class="text-right">
                <?php if(isset($_SESSION['username'])) : ?>
                    <?php echo lang_hello . $_SESSION['username']; ?>
                    <a href="http://<?php echo root_addres . '/' . $lang?>/logout" class="btn-sm btn-danger">
                        <?php echo lang_logout; ?>
                    </a>
                <?php else : ?>
                    <?php echo lang_notloggetheader; ?>
                    <a href="http://<?php echo root_addres . '/' . $lang?>/login" class="btn btn-success">
                        <?php echo lang_login; ?>
                    </a>
                    <a href="http://<?php echo root_addres . '/' . $lang?>/register" class="btn btn-danger">
                        <?php echo lang_signup; ?>
                    </a>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
            if(isset($page)){
                echo $page; 
            }
            else if(!isset($_SESSION['username'])){
                echo "<h1 class='text-center'>". lang_notloggettext ."</h1>";
            }
        ?>
    </div>
    
    
    <script type="text/javascript" src="http://<?php echo root_addres; ?>/assets/js/jquery-3.1.0.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="http://<?php echo root_addres; ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://<?php echo root_addres; ?>/assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="http://<?php echo root_addres; ?>/assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript" src="http://<?php echo root_addres; ?>/assets/js/main.js"></script>
</body>
</html>