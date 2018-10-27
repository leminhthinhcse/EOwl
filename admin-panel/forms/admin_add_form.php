<fieldset>
    <div class="form-group">
        <label for="user_name">Name *</label>
          <input type="text" name="user_name" value="<?php echo $edit ? $admin['user_name'] : ''; ?>" placeholder="Name" class="form-control" id = "user_name" >
    </div> 

    <div class="form-group">
        <label for="user_email">Email *</label>
          <input type="email" name="user_email" value="<?php echo $edit ? $admin['user_email'] : ''; ?>" placeholder="Email" class="form-control" id = "user_email" >
    </div> 

    <div class="form-group">
        <label for="user_pass">Password *</label>
          <input type="password" name="user_pass" value="<?php echo $edit ? $admin['user_pass'] : ''; ?>" placeholder="Password" class="form-control" id = "user_pass" >
    </div>

    <div class="form-group">
        <label for="image">Avatar</label>
    </div> 
    <div class="form-group">
        <img src="<?php echo $edit ? $upload_dir.$admin['user_img'] : ''; ?>" height="70" width="70">
        <input type="hidden" name="user_img" value="<?php echo $edit ? $admin['user_img'] : ''; ?>">
		<input id="user_img" type="file" name="myfile">
    </div>


    <div class="form-group text-center">
        <label></label>
        <button id="btn-save"  type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div> 
    <?php
        if(isset($_SESSION['duplicateMail'])){
        
            echo '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <strong>Danger! </strong>'. $_SESSION['duplicateMail'].'
                    </div>';
            unset($_SESSION['duplicateMail']);
        }
    ?>
    <script>
    $(document).ready(function(){
        $('input[class="form-control"]').focus(function(){
            $(this).removeAttr('style');
        });

        $("#btn-save").click(function(e){
            var user_name = $('#user_name').val();
            var user_email = $('#user_email').val();
            var user_pass = $('#user_pass').val();
            var user_img = $('#user_img').val();
           
            if(user_name == ''){
                $('#user_name').css("border-color", "#DA190B");
                $('#user_name').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(user_email == ''){
                $('#user_email').css("border-color", "#DA190B");
                $('#user_email').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(user_pass == ''){
                $('#user_pass').css("border-color", "#DA190B");
                $('#user_pass').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(user_img == ''){
                $('#user_img').css("border-color", "#DA190B");
                $('#user_img').css("background", "#F2DEDE");
                e.preventDefault();
            }
            else{
                $('contact_form').unbind('submit').submit();
            }
        });
    });
    </script>           
</fieldset>