<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfNews/';
//Get Input data from query string


$db = getDbInstance();
// select the columns
$select = array('news_id', 'user_name' , 'news_posted_day' , 'news_tittle', 'news_image' , 'news_summarized_content' , 'news_link');

//Get result of the query.
$db->join("user u", "s.news_created_by = u.user_id", "INNER");
$news = $db->get("news s", null, $select);

include_once './includes/header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Quản Lý Tin Tức</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            <a href="add_news.php?operation=create">
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
                <th>Created By</th>
                <th>Posted Day</th>
                <th>Tittle</th>
                <th>Summary Content</th>
                <th>Link</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $row) : ?>
                <tr>
                    <td><?php echo $row['news_id'] ?></td>
                    <td><?php echo htmlspecialchars($row['user_name']) ?> </td>
                    <td><?php echo htmlspecialchars($row['news_posted_day']) ?></td>
	                <td><?php echo htmlspecialchars($row['news_tittle']) ?></td>
                    <td><?php echo htmlspecialchars($row['news_summarized_content']) ?> </td>
                    <td><a target="_blank" href=" <?php echo htmlspecialchars($row['news_link']) ?>">Link</a> </td>
                    <td><img src="<?php echo $upload_dir.$row['news_image'] ?>" height="80"></td>
	                <td>
					<a href="edit_news.php?news_id=<?php echo $row['news_id'] ?>&operation=edit" class="btn btn-primary btn-xs" style="margin-right: 2px;"><span class="glyphicon glyphicon-edit"></span>
                    <a href=""  class="btn btn-danger delete_btn btn-xs" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['news_id'] ?>" style="margin-right: 1px;"><span class="glyphicon glyphicon-trash"></span></td>
				</tr>
						<!-- Delete Confirmation Modal-->
					<div class="modal fade" id="confirm-delete-<?php echo $row['news_id'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_news.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">
						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['news_id'] ?>">
						          <p>Are you sure you want to delete this news?</p>
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

