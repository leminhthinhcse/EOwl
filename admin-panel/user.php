<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';
$db = getDbInstance();
$db->where('user_role', Array('student', 'teacher'), 'IN');
// select the columns
$select = array('user_id', 'user_name' , 'user_email' , 'user_role' , 'user_img');

$user = $db->get("user", null, $select);

include_once './includes/header.php';
?>
<!--Main container start-->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">User</h1>
        </div>
    </div>
        <?php include('./includes/flash_messages.php') ?>

    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata">
        <thead>
            <tr>
                <th class="header">ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user as $row) : ?>
                <tr>
                    <td><?php echo $row['user_id'] ?></td>
                    <td><img src="<?php echo $upload_dir.$row['user_img'] ?>" height="50"></td>
                    <td><?php echo htmlspecialchars($row['user_name']) ?> </td>
                    <td><?php echo htmlspecialchars($row['user_email']) ?></td>
                    <td><?php echo htmlspecialchars($row['user_role']) ?> </td>
                    
	                <td>
					    
                        <a href=""  class="btn btn-danger delete_btn btn-xs" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['user_id'] ?>" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span>
                        
                    </td>
				</tr>

						<!-- Delete Confirmation Modal-->
					<div class="modal fade" id="confirm-delete-<?php echo $row['user_id'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_<?php echo $row['user_role'] ?>.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						      
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['user_id'] ?>">
						        	
						          <p>Are you sure you want to delete this user?</p>
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

<?php include_once './includes/footer.php'; ?>