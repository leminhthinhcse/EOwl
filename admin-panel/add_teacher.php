<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';

//serve POST method, After successful insert, redirect to teachers.php page.
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = filter_input_array(INPUT_POST);
    //Insert timestamp
    
    $dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_store['user_email']);
    $numEmail = $dbMail->getValue ("user", "count(*)");

    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
    }
    else{
        

        $dbx = getDbInstance();
        $max_id = $dbx->getValue ("user", "max(user_id)");
        $teacher_id = $max_id + 1;

        $imgName = $_FILES['myfile']['name'];
        $imgTmp = $_FILES['myfile']['tmp_name'];

        if($imgName){
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            $userPic = 'student'.''.$teacher_id.'.'.$imgExt;

            move_uploaded_file($imgTmp, $upload_dir.$userPic);
            $data_to_store['user_img'] = $userPic;
        }

        $data_user = array(
            'user_name' => $data_to_store['user_name'],
            'user_email' => $data_to_store['user_email'],
            'user_pass' =>  md5($data_to_store['user_pass']),
            'user_role' => 'teacher',
            'user_img' => $data_to_store['user_img']
        );


        $db = getDbInstance();
        $stat = $db->insert ('user', $data_user);

        $db->where('user_email',$data_to_store['user_email']);

        $teacher_id = $db->get('user', null, 'user_id');

        $data_teacher = array(
            'teacher_id' => $teacher_id[0]['user_id'],
            'assigned_by' => intval($data_to_store['assigned_by']),
            'assigned_day' => date('Y-m-d H:i:s'),
            'subject' => $data_to_store['subject']
        );

        $db2 = getDbInstance();

        $stat2 = $db2->insert ('teacher', $data_teacher);
    
        if($stat && $stat2){
            $_SESSION['success'] = "teacher added successfully!";
            //Redirect to the listing page,
            header('location: teacher.php');
            //Important! Don't execute the rest put the exit/die. 
            exit();
        }
    }
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
$db2 = getDbInstance();
$db2->join("user", "admin_id = user_id", "INNER");
$admin = $db2->get('admin', null , 'admin_id, user_name');

require_once './includes/header.php';
?>
<div id="page-wrapper">
<div class="row">
     <div class="col-lg-12">
            <h2 class="page-header">Thêm Giáo Viên</h2>
        </div>
        
</div>
    <form class="form" action="" method="post"  id="teacher_form" enctype="multipart/form-data">
       <?php  include_once('./forms/teacher_add_form.php'); ?>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>