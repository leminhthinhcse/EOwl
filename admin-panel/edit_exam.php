<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate_teacher.php';
$upload_dir = './pdfOfExam/';

// Sanitize if you want
$exam_id = filter_input(INPUT_GET, 'exam_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING);
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();
$db2 = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method,
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'teacher'){
        $_SESSION['failure'] = "You don't have permission to perform this action";
        header('location: exam.php');
        exit;
    }


    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);

    $key = '';
    for ($i = 1; $i <= 50; $i++){
        $key = $key . $data_to_update['q_'.$i] . ' ';
    }
    $examData = array(
        'exam_name' => $data_to_update['exam_name'],
        'subject' => $data_to_update['subject'],
        'link_de' => $data_to_update['myFile'],
        'link_sol' => $data_to_update['myFile1'],
        'time' => $data_to_update['time'],
        'year' => $data_to_update['year'],
        'created_by' => $data_to_update['created_by'],
        'keyExam' => $key,
    );

    $imgName = $_FILES['link_de']['name'];
    $imgTmp = $_FILES['link_de']['tmp_name'];

    if($imgName && $edit){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'de0'.''.$exam_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
//        unlink($upload_dir.$data_to_update['news_image']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $examData['link_de'] = $userPic;
    }

    $imgName = $_FILES['link_sol']['name'];
    $imgTmp = $_FILES['link_sol']['tmp_name'];

    if($imgName && $edit){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'sol0'.''.$exam_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
//        unlink($upload_dir.$data_to_update['news_image']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $examData['link_sol'] = $userPic;
    }


    $db = getDbInstance();
    $db->where('exam_id',$exam_id);
    $stat = $db->update('exam', $examData);

    if($stat)
    {
        $_SESSION['success'] = "Exam updated successfully!";
        //Redirect to the listing page,
        header('location: exam.php');
        //Important! Don't execute the rest put the exit/die.
        exit();
    }


}


//If edit variable is set, we are performing the update operation.
if($edit){
//    $db2->join("exam", "admin_id = user_id", "INNER");
//    $admin = $db2->get('table_admin', null , 'admin_id, user_name');

    $db->where('exam_id', $exam_id);
    //Get data to pre-populate the form.
    $exam = $db->getOne("exam");
}
?>

<?php
include_once './includes/teacher_page_header.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <h2 class="page-header">Cập nhật đề thi</h2>
        </div>
        <!-- Flash messages -->
        <?php
        include('./includes/flash_messages.php')
        ?>

        <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">

            <?php
            //Include the common form for add and edit
            require_once('./forms/exam_form.php');
            ?>
        </form>
    </div>

<?php include_once './includes/footer.php'; ?>