<fieldset>
    <div class="form-group">
        <label for="user_name">Name *</label>
          <input type="text" name="user_name" value="<?php echo $switch ? $student['user_name'] : ''; ?>" placeholder="Name" class="form-control" id = "user_name" >
    </div>

    <div class="form-group">
        <label for="user_name">Email *</label>
          <input type="email" name="user_email" value="<?php echo $switch ? $student['user_email'] : ''; ?>" placeholder="Email" class="form-control" id = "user_email" >
    </div>  

    <div class="form-group">
        <label for="student_school">School *</label>
        <input type="text" name="student_school" value="<?php echo ''; ?>" placeholder="School" class="form-control" id="student_school">
    </div> 

    <div class="form-group">
        <label for="student_address">Address</label>
          <textarea name="student_address" placeholder="Address" class="form-control" id="student_address"><?php echo ''; ?></textarea>
    </div>

    <div class="form-group">
        <label for="image">Avatar</label>
    </div> 
    <div class="form-group">
        <img src="<?php echo $switch ? $upload_dir.$student['user_img'] : ''; ?>" height="70" width="70">
        <input type="hidden" name="user_img" value="<?php echo $switch ? $student['user_img'] : ''; ?>">
		<input type="file" name="myfile">
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
            var student_school = $('#student_school').val();
            var student_address = $('#student_address').val();
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
            if(student_school == ''){
                $('#student_school').css("border-color", "#DA190B");
                $('#student_school').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(student_address == ''){
                $('#student_address').css("border-color", "#DA190B");
                $('#student_address').css("background", "#F2DEDE");
                e.preventDefault();
            }
            else{
                $('contact_form').unbind('submit').submit();
            }
        });
    });
    </script>             
</fieldset>