<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';

if ($_SESSION['role'] !== 'admin') {
    header('HTTP/1.1 401 Unauthorized', true, 401);
    exit("401 Unauthorized");
}
$db = getDbInstance();
$del_id = filter_input(INPUT_GET, 'del_id');
$select = array('user_id', 'user_name', 'user_email' , 'admin_created_day' , 'user_img');
$db->join("admin t", "t.admin_id = u.user_id", "INNER");
$result = $db->get("user u", null, $select);

include_once 'includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-6">
            <h1 class="page-header">Thông tin Admin</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
            <a href="add_admin.php"> <button class="btn btn-success">Thêm mới</button></a>
            </div>
        </div>
</div>
 <?php include('./includes/flash_messages.php') ?>

    <?php
    if (isset($del_stat) && $del_stat == 1) {
        echo '<div class="alert alert-info">Successfully deleted</div>';
    }
    ?>
    <!--   Filter section end-->
    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata">
        <thead>
            <tr>
                <th class="header">ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created Day</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo $row['user_id'] ?></td>
                <td><img src="<?php echo $upload_dir.$row['user_img'] ?>" height="50"></td>
                <td><?php echo htmlspecialchars($row['user_name']) ?></td>
                <td><?php echo htmlspecialchars($row['user_email']) ?></td>
                <td><?php echo htmlspecialchars($row['admin_created_day']) ?></td>
                <td>
                    <a href="edit_admin.php?admin_user_id=<?php echo $row['user_id']?>&operation=edit" class="btn btn-primary  btn-xs">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
</div>
<?php include_once './includes/footer.php'; ?>