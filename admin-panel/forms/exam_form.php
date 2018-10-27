<fieldset>
    <?php $upload_dir = './pdfOfExam/';?>
    <?php
    $db1 = getDbInstance();
    $db1->where('user_id',$_SESSION['user_id']);
    $user = $db1->get('user');
    ?>

    <div class="form-group">
        <label for="created_by">Tạo bởi</label>
        <input type="text" value="<?php echo $user[0]['user_email']; ?>" readonly="true" class="form-control" required="required" id = "createdby" >
        <input type="hidden" name="created_by" value="<?php echo $edit ? $exam['created_by'] : $_SESSION['user_id']; ?>" readonly="true" class="form-control" required="required" id = "created_by" >
    </div>

    <div class="form-group">
        <label for="exam_name">Tên</label>
        <input type="text" name="exam_name" value="<?php echo $edit ? $exam['exam_name'] : ''; ?>" placeholder="Tên Đề thi" class="form-control" required="required" id="exam_name">
    </div>

    <div class="form-group">
        <label for="subject">Môn</label>
        <select class="form-control" id="subject" name="subject" required="required">
            <option value="Toán học" <?php if($edit){if($exam['subject']=='Toán học'){echo 'selected';}} ?>>Toán học</option>
            <option value="Ngữ văn" <?php if($edit){if($exam['subject']=='Ngữ văn'){echo 'selected';}} ?>>Ngữ văn</option>
            <option value="Sinh học" <?php if($edit){if($exam['subject']=='Sinh học'){echo 'selected';}} ?>>Sinh học</option>
            <option value="Vật lý" <?php if($edit){if($exam['subject']=='Vật lý'){echo 'selected';}} ?>>Vật lý</option>
            <option value="Hóa học" <?php if($edit){if($exam['subject']=='Hóa học'){echo 'selected';}} ?>>Hóa học</option>
            <option value="Lịch sử" <?php if($edit){if($exam['subject']=='Lịch sử'){echo 'selected';}} ?>>Lịch sử</option>
            <option value="Địa lý" <?php if($edit){if($exam['subject']=='Địa lý'){echo 'selected';}} ?>>Địa lý</option>
            <option value="Ngoại Ngữ" <?php if($edit){if($exam['subject']=='Ngoại ngữ'){echo 'selected';}} ?>>Ngoại ngữ</option>
            <option value="Giáo dục công dân" <?php if($edit){if($exam['subject']=='Giáo dục công dân'){echo 'selected';}} ?>>Giáo dục công dân</option>
            <option value="Công nghệ" <?php if($edit){if($exam['subject']=='Công nghệ'){echo 'selected';}} ?>>Công nghệ</option>
            <option value="Tin học" <?php if($edit){if($exam['subject']=='Tin học'){echo 'selected';}} ?>>Tin học</option>
            <option value="Khác" <?php if($edit){if($exam['subject']=='Khác'){echo 'selected';}} ?>>Khác</option>
        </select>
    </div>

    <div class="form-group">
        <label for="year">Năm</label>
        <input type="number" class="form-control" value="<?php echo $edit ? $exam['year'] : ''; ?>" name="year" id="year" required="required" max="<?php echo date("Y"); ?>">
    </div>

    <div class="form-group">
        <label for="link_de">File đề thi</label>
        <?php if($edit){ ?>
                <a target="_blank" href=" <?php echo htmlspecialchars($upload_dir.$exam['link_de']) ?>"><?php echo htmlspecialchars($exam['link_de']) ?></a>
        <?php }?>
        <input type="hidden" name="myFile" value="<?php echo $edit ? $exam['link_de'] : ''; ?>">
        <input type="file" class="form-control" name="link_de" id="link_de" <?php echo $edit ? '' : 'required'; ?>>
    </div>

    <div class="form-group">
        <label for="link_de">File lời giải</label>
        <?php if($edit){ ?>
            <a target="_blank" href=" <?php echo htmlspecialchars($upload_dir.$exam['link_sol']) ?>"><?php echo htmlspecialchars($exam['link_sol']) ?></a>
        <?php }?>
        <input type="hidden" name="myFile1" value="<?php echo $edit ? $exam['link_sol'] : ''; ?>">
        <input type="file" class="form-control" name="link_sol" id="link_sol" <?php echo $edit ? '' : 'required'; ?>>
    </div>

    <div class="form-group">
        <label for="time">Thời gian làm bài</label>
        <input type="number" class="form-control" value="<?php echo $edit ? $exam['time'] : ''; ?>" name="time" id="time" required="required" max="180">
    </div>

    <div class="form-group">
        <label for="key">Đáp án</label>
        <div class="container">
        <?php
        if($edit){
            for($i =0; $i < 50; $i++){
                $key[$i] = $exam['keyExam'][2*$i];
            }
        }
        ?>

        <?php for ($x = 1; $x <= 50; $x++) {?>
            <?php if($x % 5==0) {?>
                <div class="row">
            <?php }?>
            <div class="col-lg-2">
            <label for="q.<?php echo $x?>"> Câu <?php echo $x?></label>
            <fieldset id="q.<?php echo $x?>" class="form-control">
                <input type="radio" value="A" name="q.<?php echo $x?>" required="required" <?php if($edit){if($key[$x-1]=='A'){echo 'checked';} else echo '';} ?>>
                <label>A</label>
                <input type="radio" value="B" name="q.<?php echo $x?>" required="required" <?php if($edit){if($key[$x-1]=='B'){echo 'checked';} else echo '';} ?>>
                <label>B</label>
                <input type="radio" value="C" name="q.<?php echo $x?>" required="required" <?php if($edit){if($key[$x-1]=='C'){echo 'checked';} else echo '';} ?>>
                <label>C</label>
                <input type="radio" value="D" name="q.<?php echo $x?>" required="required" <?php if($edit){if($key[$x-1]=='D'){echo 'checked';} else echo '';} ?>>
                <label>D</label>

            </fieldset>
            </div>
            <?php if($x % 5==0) {?>
                </div>
            <?php }?>
        <?php }?>
        </div>
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
    </div>


</fieldset>
