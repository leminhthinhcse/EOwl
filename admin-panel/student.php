<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';

$db = getDbInstance();
// select the columns
$select = array('student_id', 'user_email' , 'user_name' , 'student_school', 'student_address' , 'user_role', 'user_img');

//Start building query according to input parameters.

//Get result of the query.
$db->join("user u", "s.student_id = u.user_id", "INNER");
$student = $db->get("student s", null, $select);

include_once './includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Student</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_student.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm Mới</button>
	            </a>
            </div>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>
    
<!--   Filter section end-->

    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata">
        <thead>
            <tr>
                <th class="header">ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>School</th>
                <th>Address</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($student as $row) : ?>
                <tr>
                    <td><?php echo $row['student_id'] ?></td>
                    <td><img src="<?php echo $upload_dir.$row['user_img'] ?>" height="50"></td>
                    <td><?php echo htmlspecialchars($row['user_name']) ?> </td>
                    <td><?php echo htmlspecialchars($row['user_email']) ?></td>
	                <td><?php echo htmlspecialchars($row['student_school']) ?></td>
                    <td><?php echo htmlspecialchars($row['student_address']) ?> </td>
                    <td><?php echo htmlspecialchars($row['user_role']) ?> </td>
	                <td>
					<a href="edit_student.php?student_id=<?php echo $row['student_id'] ?>&operation=edit" class="btn btn-primary btn-xs" style="margin-right: 3px;"><span class="glyphicon glyphicon-edit"></span>
                    <a href="switch_student.php?student_id=<?php echo $row['student_id'] ?>&operation=switch"  class="btn btn-info btn-xs" style="margin-right: 3px;"><span class="glyphicon glyphicon-transfer"></span>
					<a href=""  class="btn btn-danger delete_btn btn-xs" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['student_id'] ?>" style="margin-right: 3px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['student_id'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_student.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						        	<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['student_id'] ?>">
						            <p>Are you sure you want to delete this student?</p>
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

