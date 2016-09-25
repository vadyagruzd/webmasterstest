<?php require_once (LANGUAGE_DIR . $lang . '/' . $lang .'.php'); ?>
<div class="row">
    <div class="col-md-4">
        <img src="
            <?php 
                if($data['photopath']) echo "\.\\files\\" . $data['photopath'];
                else echo "/files/empty_avatar.png";
            ?>
             " class="img-circle" height="220px" width="220px"/>
    </div>
    <div class="col-md-6 form-group"> 
        <label class="control-label" for="username"><?php echo lang_username; ?></label>
        <span name="lastname" class="form-control"><?php echo $data['username']; ?></span>
        <label class="control-label" for="firstname"><?php echo lang_firstname; ?></label>    
        <span name="firstname" class="form-control"><?php echo $data['firstname']; ?></span>
        <label class="control-label" for="lastname"><?php echo lang_lastname; ?></label>
        <span name="lastname" class="form-control"><?php echo $data['lastname']; ?></span>
        <label class="control-label" for="email"><?php echo lang_email; ?></label>    
        <span name="email" class="form-control"><?php echo $data['email']; ?></span>
        <label class="control-label" for="birthdate"><?php echo lang_birthdate; ?></label>
        <span name="birthdate" class="form-control"><?php echo $data['birthdate']; ?></span>
    </div>
</div>
