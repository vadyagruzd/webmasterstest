<?php require_once (LANGUAGE_DIR . $lang . '/' . $lang .'.php'); ?>
<?php if($error): ?>
     <?php foreach ($error as $error1): ?>
        <div class="alert-danger">
            <?php echo $error1; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<form role="form" class="form-horizontal" method="POST" novalidate id="register-form" enctype="multipart/form-data" >
    <div class="form-group login-group">
        <label for="name" class="col-sm-2 control-label"><?php echo lang_username; ?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="login" required placeholder="<?php echo lang_label_username; ?>">
        </div>
    </div>
    
    <div class="form-group password-group">
        <label for="password" class="col-sm-2 control-label"><?php echo lang_password; ?></label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password" required placeholder="<?php echo lang_label_password; ?>">
        </div>
    </div>
    
    <div class="form-group password-confirm-group">
        <label for="password-confirm" class="col-sm-2 control-label"><?php echo lang_confirm_password; ?></label>
        <div class="col-sm-5">
            <input type="password" class="form-control" name="password-confirm" required placeholder="<?php echo lang_confirm_password; ?>">
        </div>
    </div>
    
    <div class="form-group birthday-group">
        <label for="birthdate" class="col-sm-2 control-label"><?php echo lang_label_birthdate; ?>:</label>
        <div class='col-sm-5'>
            <div class="input-group date" id='birthdate'>
                <input type='text' name='birthdate' class="form-control" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    
    <div class="form-group email-group">
        <label for="email" class="col-sm-2 control-label"><?php echo lang_email; ?></label>
        <div class="col-sm-5">
            <input type="email" class="form-control" name="email" required placeholder="<?php echo lang_label_email; ?>">
        </div>
    </div>
    
    <div class="form-group firstname-group">
        <label for="firstname" class="col-sm-2 control-label"><?php echo lang_firstname; ?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="firstname" required placeholder="<?php echo lang_label_firstname; ?>">
        </div>
    </div>
    
    <div class="form-group lastname-group">
        <label for="lastname" class="col-sm-2 control-label"><?php echo lang_lastname; ?></label>
        <div class="col-sm-5">
            <input type="text" class="form-control" name="lastname" required placeholder="<?php echo lang_label_lastname; ?>">
        </div>
    </div>
    
    <div class="form-group">
        <label for="avatar" class="col-sm-2 control-label"><?php echo lang_label_avatar; ?>:</label>
        <div class="col-sm-5">
            <input type="file" name="avatar" class="form-control">
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="col-sm-7">
            <input type="submit" id="register-btn" value="<?php echo lang_signup; ?>" class="btn btn-success"  />
        </div>
    </div>
</form>
