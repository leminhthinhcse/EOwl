<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';
// Kiểm tra có phải là admin không, nếu không phải admin thì phải đẩy nó ra trang khác.
if ($_SESSION['role'] !== 'admin') {
    // show permission denied message
    echo 'Permission Denied';
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$data_to_store = filter_input_array(INPUT_POST);

	$dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_store['user_email']);
    $numEmail = $dbMail->getValue ("user", "count(*)");

    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
	}

	else{

        $dbx = getDbInstance();
        $max_id = $dbx->getValue ("user", "max(user_id)");
        $admin_id = $max_id + 1;

        $imgName = $_FILES['myfile']['name'];
        $imgTmp = $_FILES['myfile']['tmp_name'];

        if($imgName){
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            $userPic = 'admin'.''.$admin_id.'.'.$imgExt;
            //unlink($upload_dir.$data_to_store['user_img']);
            move_uploaded_file($imgTmp, $upload_dir.$userPic);
            $data_to_store['user_img'] = $userPic;
        }


		$data_user = array(
            'user_name' => $data_to_store['user_name'],
            'user_email' => $data_to_store['user_email'],
            'user_pass' =>  md5($data_to_store['user_pass']),
            'user_role' => 'admin',
            'user_img' => $data_to_store['user_img']
        );
        $db = getDbInstance();
        $stat = $db->insert ('user', $data_user);
        $db->where('user_email',$data_to_store['user_email']);
		$admin_id = $db->get('user', null, 'user_id');
		$data_to_store['admin_created_day'] = date('Y-m-d H:i:s');
        $data_admin = array(
            'admin_id' => $admin_id[0]['user_id'],
            'admin_created_day' => $data_to_store['admin_created_day']
		);
        $db2 = getDbInstance();
        $stat2 = $db2->insert ('admin', $data_admin);
        if($stat && $stat2){
            $_SESSION['success'] = "Admin user added successfully!";
    		header('location: admin_users.php');
    		exit();
        }
	}
}

$edit = false;

require_once './includes/header.php';
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">Add Admin</h2>
		</div>
	</div>
	<!-- Success message -->
	<form class="well form-horizontal" action=" " method="post" id="contact_form" enctype="multipart/form-data">
		<?php include_once './forms/admin_add_form.php'; ?>
	</form>
</div>

<?php include_once './includes/footer.php'; ?>