<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';
// Sanitize if you want
$teacher_id = filter_input(INPUT_GET, 'teacher_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;

 $db = getDbInstance();
 $db2 = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get teacher id form query string parameter.
    $teacher_id = filter_input(INPUT_GET, 'teacher_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);
    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];
    
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'user'.''.$teacher_id.'.'.$imgExt;
        //var_dump($upload_dir.$data_to_update['user_img']);die();
        unlink($upload_dir.$data_to_update['user_img']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $data_to_update['user_img'] = $userPic;
    }

    $dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_update['user_email']);
    $dbMail->where('not user_id', $teacher_id);
    $numEmail = $dbMail->getValue ("user", "count(*)");


    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
    }
    else{
        
        $data_to_update['assigned_day'] = date('Y-m-d H:i:s');
        $data_user = array(
            'user_name' => $data_to_update['user_name'],
            'user_email' => $data_to_update['user_email'],
            'user_img' => $data_to_update['user_img']
        );
        $data_teacher = array(
            'assigned_by' => intval($data_to_update['assigned_by']),
            'assigned_day' => $data_to_update['assigned_day'],
            'subject' => $data_to_update['subject']
        );
        $db = getDbInstance();
        $db2 = getDbInstance();
        $db->where('teacher_id',$teacher_id);
        $stat = $db->update('teacher', $data_teacher);
    
        $db2->where('user_id',$teacher_id);
        $stat2 = $db2->update('user', $data_user);
    
        if($stat && $stat2)
        {
            $_SESSION['success'] = "teacher updated successfully!";
            //Redirect to the listing page,
            header('location: teacher.php');
            //Important! Don't execute the rest put the exit/die. 
            exit();
        }
    }
    
}


//If edit variable is set, we are performing the update operation.
if($edit){
    $db2->join("user", "admin_id = user_id", "INNER");
    $admin = $db2->get('admin', null , 'admin_id, user_name');

    $db->join("user u", "teacher_id = u.user_id", "INNER");
    
    $db->where('teacher_id', $teacher_id);
    //Get data to pre-populate the form.
    $teacher = $db->getOne("teacher");
}
?>


<?php
    include_once './includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Teacher</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/teacher_form.php'); 
        ?>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>