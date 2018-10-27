<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate_teacher.php';
$upload_dir = './pdfOfExam/';
//Get Input data from query string

//Get current page.

// If filter types are not selected we show latest added data first

$db = getDbInstance();
// select the columns
$select = array('exam_id', 'exam_name' , 'subject' , 'year', 'link_de', 'link_sol', 'time', 'keyExam' , 'created_by');

$exam = $db->where('created_by',$_SESSION['user_id'])->get("exam s", null, $select);

include_once './includes/teacher_page_header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Quản Lý Đề Thi</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
                <a href="add_exam.php?operation=create">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm mới </button>
                </a>
            </div>
        </div>
    </div>
    <?php include('./includes/flash_messages.php') ?>
    
    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata">
        <thead>
        <tr>
            <th class="header">ID</th>
            <th>Tên</th>
            <th>Môn</th>
            <th>Năm</th>
            <th>Đề</th>
            <th>Lời giải</th>
            <th>Th.gian</th>
            <th>Đáp án</th>
            <th>Tạo bởi</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($exam as $row) : ?>
            <tr>
                <td><?php echo $row['exam_id'] ?></td>
                <td><?php echo htmlspecialchars($row['exam_name']) ?> </td>
                <td><?php echo htmlspecialchars($row['subject']) ?></td>
                <td><?php echo htmlspecialchars($row['year']) ?></td>
                <td><a target="_blank" href=" <?php echo htmlspecialchars($upload_dir.$row['link_de']) ?>"><?php echo htmlspecialchars($row['link_de']) ?></a> </td>
                <td><a target="_blank" href=" <?php echo htmlspecialchars($upload_dir.$row['link_sol']) ?>"><?php echo htmlspecialchars($row['link_sol']) ?></a> </td>
                <td><?php echo htmlspecialchars($row['time']) ?> </td>
                <td><?php echo htmlspecialchars($row['keyExam']) ?> </td>
                <?php
                $db1 = getDbInstance();
                $db1->where('user_id',$row['created_by']);
                $user = $db1->get('user');
                ?>
                <td><?php echo htmlspecialchars($user[0]['user_email']) ?> </td>


                <td>

                    <a href="record.php?exam_id=<?php echo $row['exam_id'] ?>" class="btn btn-success btn-sm" style="margin: 1px;"><span class="glyphicon glyphicon-th-list"></span></a>
                    <a href="edit_exam.php?exam_id=<?php echo $row['exam_id'] ?>&operation=edit" class="btn btn-primary btn-sm" style="margin: 1px;"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="" class="btn btn-danger delete_btn btn-sm" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['exam_id'] ?>" style="margin: 1px;"><span class="glyphicon glyphicon-trash"></span></a>

                </td>
            </tr>
            <!-- Delete Confirmation Modal-->
            <div class="modal fade" id="confirm-delete-<?php echo $row['exam_id'] ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_exam.php" method="POST">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['exam_id'] ?>">
                                <p>Bạn có chắc là muốn xóa đề thi này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

