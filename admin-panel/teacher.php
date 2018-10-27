<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';

$db = getDbInstance();
$db2 = getDbInstance();

// select the columns
$select = array('teacher_id', 'user_email' , 'user_name' , 'assigned_by', 'assigned_day' , 'user_role' , 'user_img' , 'subject');

//Start building query according to input parameters.
$db->join("teacher t", "t.teacher_id = u.user_id", "INNER");
$teacher = $db->get("user u", null, $select);

include_once './includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Teacher</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_teacher.php?operation=create">
	            	<button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Thêm mới </button>
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
                <th>Assigned By</th>
                <th>Assigned Day</th>
                <th>Role</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($teacher as $row) : ?>
                <tr>
                    <td><?php echo $row['teacher_id'] ?></td>
                    <td><img src="<?php echo $upload_dir.$row['user_img'] ?>" height="50"></td>
                    <td><?php echo htmlspecialchars($row['user_name']) ?> </td>
	                <td><?php echo htmlspecialchars($row['user_email']) ?></td>
                    <td><?php echo htmlspecialchars($row['assigned_by']) ?> </td>
                    <td><?php echo htmlspecialchars($row['assigned_day']) ?> </td>
                    <td><?php echo htmlspecialchars($row['user_role']) ?> </td>
                    <td><?php echo htmlspecialchars($row['subject']) ?> </td>
	                <td>
					<a href="edit_teacher.php?teacher_id=<?php echo $row['teacher_id'] ?>&operation=edit" class="btn btn-primary btn-xs" style="margin-right: 3px;"><span class="glyphicon glyphicon-edit"></span>
                    <a href="switch_teacher.php?teacher_id=<?php echo $row['teacher_id'] ?>&operation=switch"  class="btn btn-info btn-xs" style="margin-right: 3px;"><span class="glyphicon glyphicon-transfer"></span>
					<a href=""  class="btn btn-danger delete_btn btn-xs" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['teacher_id'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>

						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['teacher_id'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_teacher.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['teacher_id'] ?>">
						        	
						          <p>Are you sure you want to delete this teacher?</p>
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