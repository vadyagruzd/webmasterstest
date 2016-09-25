<?php require_once (LANGUAGE_DIR . $lang . '/' . $lang .'.php'); ?>
<form role="form" class="form-horizontal" method="POST" >
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label"><?php echo lang_username;?></label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="login" required placeholder="<?php echo lang_username;?>">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label"><?php echo lang_password;?></label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" required placeholder="<?php echo lang_password;?>">
        </div>
    </div>
    <div class="form-group text-center">
        <input type="submit" name="login-btn" value="<?php echo lang_login;?>" class="btn btn-success"/>
        <a href="http://<?php echo $_SERVER['SERVER_NAME'] . '/' . $lang?>/register" class="btn btn-warning"><?php echo lang_signup;?></a>
    </div>
</form>

<?php
if($error) echo $error;