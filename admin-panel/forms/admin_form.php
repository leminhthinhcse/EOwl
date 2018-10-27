<fieldset>
    <!-- Form Name -->
    <legend>Cập nhật thông tin của Admin</legend>
    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  type="text" name="user_name" placeholder="Name" class="form-control" value="<?php echo ($edit) ? $admin['user_name'] : ''; ?>" required="" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Email</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input  type="email" name="user_email" placeholder="Email" class="form-control" value="<?php echo ($edit) ? $admin['user_email'] : ''; ?>" required="" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >Old Password</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="user_oldpass" placeholder="Old Password" class="form-control" required="" autocomplete="off">
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" >New Password</label>
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="user_newpass" placeholder="New Password" class="form-control" required="" autocomplete="off">
            </div>
        </div>
    </div>    
    
    <div class="form-group">
        <label for="image" class="col-md-4 control-label" >Avatar</label>
        <div class="col-md-4 inputGroupContainer">
            <img src="<?php echo $upload_dir.$admin['user_img'] ?>" height="70" width="70">
            <input type="hidden" name="user_img" value="<?php echo $edit ? $admin['user_img'] : ''; ?>">
            <input type="file" name="myfile">
        </div>
    </div>
    
    <!-- Button -->
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
        </div>
    </div>
    <?php
        if(isset($_SESSION['duplicateMail'])){
        
            echo '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Danger! </strong>'. $_SESSION['duplicateMail'].'
                    </div>';
            unset($_SESSION['duplicateMail']);
        }
        else if(isset($_SESSION['invalidOldPass'])){
            echo '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Danger! </strong>'. $_SESSION['invalidOldPass'].'
                    </div>';
            unset($_SESSION['invalidOldPass']);
        }
    ?>
</fieldset>