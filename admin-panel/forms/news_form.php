<fieldset>
    <?php $upload_dir = '../imagesOfNews/';?>
    <div class="form-group">
        <label>Assigned By </label>
            <select name="news_created_by" class="form-control" id="assigned_by" name="assigned_by">
                <option value=''>Chọn Admin</option>
                <?php
                foreach ($admin as $opt) {
                    if ($edit && $opt['admin_id'] == $news['news_created_by']) {
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
        <label for="user_name">Posted Day</label>
          <input type="date" name="news_posted_day" value="<?php echo $edit ? $news['news_posted_day'] : ''; ?>" placeholder="Posted Day" class="form-control" id = "posted_day" >
    </div>   
   

    <div class="form-group">
        <label for="news_tittle">Tittle</label>
        <input type="text" name="news_tittle" value="<?php echo $edit ? $news['news_tittle'] : ''; ?>" placeholder="Tittle" class="form-control" id="student_att">
    </div> 

    <div class="form-group">
        <label for="news_summarized_content">Summary Content</label>
          <textarea name="news_summarized_content" placeholder="Summary Content" class="form-control" id="student_att2"><?php echo ($edit)? $news['news_summarized_content'] : ''; ?></textarea>
    </div>   

    <div class="form-group">
        <label for="news_link">Link</label>
        <input style="color: blue" type="text" name="news_link" value="<?php echo $edit ? $news['news_link'] : ''; ?>" placeholder="Link" class="form-control" id="student_att3">
        
    </div> 

    <div class="form-group">
        <label for="Image">Image</label>

    </div> 
    <div class="form-group">
        <img src="<?php echo $upload_dir.$news['news_image'] ?>" height="42" width="42">
        <input type="hidden" name="news_image" value="<?php echo $edit ? $news['news_image'] : ''; ?>">
		<input type="file" name="myfile">
    </div>
    

    <div class="form-group text-center">
        <label></label>
        <button id="btn-save"  type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>
    <script>
    $(document).ready(function(){
        $('input[class="form-control"]').focus(function(){
            $(this).removeAttr('style');
        });

        $("#btn-save").click(function(e){
            var posted_day = $('#posted_day').val();
            var student_att = $('#student_att').val();
            var student_att2 = $('#student_att2').val();
            var student_att3 = $('#student_att3').val();
            var assigned_by = $('#assigned_by').val();
            if(posted_day == ''){
                $('#posted_day').css("border-color", "#DA190B");
                $('#posted_day').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(student_att == ''){
                $('#student_att').css("border-color", "#DA190B");
                $('#student_att').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(student_att2 == ''){
                $('#student_att2').css("border-color", "#DA190B");
                $('#student_att2').css("background", "#F2DEDE");
                e.preventDefault();
            }
            if(student_att3 == ''){
                $('#student_att3').css("border-color", "#DA190B");
                $('#student_att3').css("background", "#F2DEDE");
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