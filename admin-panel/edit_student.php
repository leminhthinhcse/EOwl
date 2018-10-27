<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';

// Sanitize if you want
$student_id = filter_input(INPUT_GET, 'student_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get student id form query string parameter.
    $student_id = filter_input(INPUT_GET, 'student_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);

    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];

    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'user'.''.$student_id.'.'.$imgExt;
        unlink($upload_dir.$data_to_update['user_img']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $data_to_update['user_img'] = $userPic;
    }

    $dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_update['user_email']);
    $dbMail->where('not user_id', $student_id);
    $numEmail = $dbMail->getValue ("user", "count(*)");

    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
    }
    else{
        $data_user = array(
            'user_name' => $data_to_update['user_name'],
            'user_email' => $data_to_update['user_email'],
            'user_img' => $data_to_update['user_img']

        );
        
        $data_student = array(
            'student_school' => $data_to_update['student_school'],
            'student_address' => $data_to_update['student_address']
        );
    
        //$data_to_update['updated_at'] = date('Y-m-d H:i:s');
        $db = getDbInstance();
        $db->where('student_id',$student_id);
        $stat = $db->update('student', $data_student);
    
        $db2 = getDbInstance();
        
        $db2->where('user_id',$student_id);
        $stat2 = $db2->update('user', $data_user);
    
        if($stat || $stat2)
        {
            $_SESSION['success'] = "student updated successfully!";
            //Redirect to the listing page,
            header('location: student.php');
            //Important! Don't execute the rest put the exit/die. 
            exit();
        }
    }

    
}


//If edit variable is set, we are performing the update operation.
if($edit){
    $db->join("user u", "student_id = u.user_id", "INNER");
    
    $db->where('student_id', $student_id);
    //Get data to pre-populate the form.
    $student = $db->getOne("student");
}
?>


<?php
    include_once './includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Update Student</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/student_form.php'); 
        ?>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>