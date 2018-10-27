<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';
$admin_user_id=  filter_input(INPUT_GET, 'admin_user_id');
$db = getDbInstance();
//Serve POST request.  
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    // If non-super user accesses this script via url. Stop the exexution
    
    // Sanitize input post if we want
    $data_to_update = filter_input_array(INPUT_POST);
    $admin_user_id=  filter_input(INPUT_GET, 'admin_user_id',FILTER_VALIDATE_INT);

    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];
    
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'user'.''.$admin_user_id.'.'.$imgExt;
        unlink($upload_dir.$data_to_update['user_img']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $data_to_update['user_img'] = $userPic;
    }


    //Encrypting the password
    $data_to_update['user_oldpass']=md5($data_to_update['user_oldpass']);
    $data_to_update['user_newpass']=md5($data_to_update['user_newpass']);

    $dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_update['user_email']);
    $dbMail->where('not user_id', $admin_user_id);
    $numEmail = $dbMail->getValue ("user", "count(*)");

    $dbPass = getDbInstance();
    $dbPass->where('not user_pass',$data_to_update['user_oldpass']);
    $dbPass->where('user_id', $admin_user_id);
    $numPass = $dbPass->getValue ("user", "count(*)");


    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
    }
    else if($numPass > 0){
        $_SESSION['invalidOldPass'] = "Mật khẩu cũ đã được nhập không chính xác, vui lòng nhập lại thông tin!";
    }
    else{
        $data_admin = array(
            'user_name' => $data_to_update['user_name'],
            'user_email' => $data_to_update['user_email'],
            'user_pass' => $data_to_update['user_newpass'],
            'user_img' => $data_to_update['user_img']
        );
        $db = getDbInstance();
        $db->where('user_id',$admin_user_id);
        $stat = $db->update('user', $data_admin);
        if($stat){
            $_SESSION['success'] = "Admin user has been updated successfully";
        }
        else{
            $_SESSION['failure'] = "Failed to update Admin user";
        }

        header('location: admin_users.php');
    }
}


$operation = filter_input(INPUT_GET, 'operation', FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;

//Select where clause

$db->join("admin t", "t.admin_id = u.user_id", "INNER");
$db->where('u.user_id', $admin_user_id);
$admin = $db->getOne("user u");
// Set values to $row

// import header
require_once './includes/header.php';
?>
<div id="page-wrapper">

    <div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Update Admin</h2>
        </div>
        
    </div>
    
    <form class="well form-horizontal" action="" method="post"  id="contact_form" enctype="multipart/form-data">
        <?php include_once './forms/admin_form.php'; ?>
    </form>
</div>




<?php include_once './includes/footer.php'; ?>