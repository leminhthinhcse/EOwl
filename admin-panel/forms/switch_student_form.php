<fieldset>
    <div class="form-group">
        <label for="user_name">Name *</label>
          <input type="text" name="user_name" value="<?php echo $switch ? $student['user_name'] : ''; ?>" placeholder="First Name" class="form-control" id = "user_name" >
    </div> 

    <div class="form-group">
        <label for="user_name">Email *</label>
          <input type="email" name="user_email" value="<?php echo $switch ? $student['user_email'] : ''; ?>" placeholder="Email" class="form-control" id = "user_email" >
    </div> 

    <div class="form-group">
        <label>Subject</label>
            <select id="subject" name="subject" class="form-control selectpicker" required>
                <option value='' >Chọn Môn Học</option>
                <?php
                $subject = array('Toán học','Ngữ văn','Sinh học','Vật lý','Hóa học','Lịch sử','Địa lý','Ngoại ngữ','Giáo dục công dân','Công nghệ','Tin học');
                foreach ($subject as $opt) {
                    if ($edit && $opt == $teacher['subject']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt.'"' . $sel . '>' . $opt. '</option>';
                }

                ?>
            </select>
    </div>

    <div class="form-group">
        <label>Assigned By </label>
            <select id="assigned_by" name="assigned_by" class="form-control selectpicker" required>
                <option value='' >Chọn Admin</option>
                <?php
                foreach ($admin as $opt) {
                    if ($switch && $opt['admin_id'] == $teacher['assigned_by']) {
                        $sel = "selected";
                    } else {
                        $sel = "";
                    }
                    echo '<option value="'.$opt['admin_id'].'"' . $sel . '>' . $opt['user_name'] . '</option>';
                }

                ?>
            </select>
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
            var assigned_by = $('#assigned_by').val();
            var subject = $('#subject').val();
            
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
            if(subject == ''){
                $('#subject').css("border-color", "#DA190B");
                $('#subject').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(assigned_by == ''){
                $('#assigned_by').css("border-color", "#DA190B");
                $('#assigned_by').css("background", "#F2DEDE");
                e.preventDefault();
            }
            
            else{
                $('contact_form').unbind('submit').submit();
            }
        });
    });
    </script>        
</fieldset>