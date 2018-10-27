<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfUsers/';
$link_exam = './pdfOfExam/';
// Sanitize if you want
$teacher_id = filter_input(INPUT_GET, 'teacher_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'switch') ? $switch = true : $switch = false;
 $db = getDbInstance();
//Chuyển từ giáo viên sang học sinh
//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get student id form query string parameter.
    $teacher_id = filter_input(INPUT_GET, 'teacher_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);

    
    $dbMail = getDbInstance();
    $dbMail->where('user_email',$data_to_update['user_email']);
    $dbMail->where('not user_id', $teacher_id);
    $numEmail = $dbMail->getValue ("user", "count(*)");

    if($numEmail > 0){
        $_SESSION['duplicateMail'] = "Email đã tồn tại trong hệ thống!";
    }
    else{

        $imgName = $_FILES['myfile']['name'];
        $imgTmp = $_FILES['myfile']['tmp_name'];
        
        if($imgName){
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            $userPic = 'user'.''.$teacher_id.'.'.$imgExt;
            unlink($upload_dir.$data_to_update['user_img']);
            move_uploaded_file($imgTmp, $upload_dir.$userPic);
            $data_to_update['user_img'] = $userPic;
        }

        $data_student = array(
            'student_id' => $teacher_id,
            'student_school' => $data_to_update['student_school'],
            'student_address' => $data_to_update['student_address']
        );
        
        $db = getDbInstance();
        $stat = $db->insert('student', $data_student);

        $data_user = array(
            'user_role' => 'student',
            'user_img' => $data_to_update['user_img']

        );

        $db1 = getDbInstance();
        $db1->where('user_id',$teacher_id);
        $stat1 = $db1->update('user', $data_user);

        $dbExam = getDbInstance();
        $dbExam->where('created_by', $teacher_id);
        $selectExam = array('link_de', 'link_sol');
        $exams = $dbExam->get('exam', null, $selectExam);
        foreach ($exams as $exam){
            unlink($link_exam.$exam['link_de']);
            unlink($link_exam.$exam['link_sol']);
        }

        $db2 = getDbInstance();
        $db2->where('teacher_id',$teacher_id);
        $stat2 = $db2->delete('teacher');
    
        if($stat && $stat1 && $stat2){
            $_SESSION['success'] = "Teacher switched successfully!";
            header('location: teacher.php');  
            exit();
        }
        else{
            echo "Fail";
            exit();
        }
    }
}

//If switch variable is set, we are performing the update operation.
if($switch){
    $db->join("user u", "teacher_id = u.user_id", "INNER");
    $db->where('teacher_id', $teacher_id);
    $student = $db->getOne("teacher");

}
?>

<?php include_once './includes/header.php';?>

<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Switch Teacher: New Student</h2>
    </div>
    <?php include('./includes/flash_messages.php') ?>
    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        <?php
            //Include the common form for add and switch  
            require_once('./forms/switch_teacher_form.php'); 
        ?>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>