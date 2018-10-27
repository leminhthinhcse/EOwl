<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate_teacher.php';
$upload_dir = './pdfOfExam/';

//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = filter_input_array(INPUT_POST);
    //Insert timestamp
    //$data_to_store['created_at'] = date('Y-m-d H:i:s');
    $key = '';
    for ($i = 1; $i <= 50; $i++){
        $key = $key . $data_to_store['q_'.$i] . ' ';
    }
    $examData = array(
        'exam_name' => $data_to_store['exam_name'],
        'subject' => $data_to_store['subject'],
        'link_de' => null,
        'link_sol' => null,
        'time' => $data_to_store['time'],
        'year' => $data_to_store['year'],
        'created_by' => $data_to_store['created_by'],
        'keyExam' => $key,
    );

    $db = getDbInstance();
    $max_id = $db->getValue ("exam", "max(exam_id)");
    $exam_id = $max_id + 1;

    $imgName = $_FILES['link_de']["name"];
    $imgTmp = $_FILES['link_de']["tmp_name"];
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPdf = 'de0'.''.$exam_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
//        unlink($upload_dir.$data_to_store['link_de']);
        move_uploaded_file($imgTmp, $upload_dir.basename($userPdf));
        $examData['link_de'] = $userPdf;
    }

    $imgName = $_FILES['link_sol']["name"];
    $imgTmp = $_FILES['link_sol']["tmp_name"];
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPdf = 'sol0'.''.$exam_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
//        unlink($upload_dir.$data_to_store['link_de']);
        move_uploaded_file($imgTmp, $upload_dir.basename($userPdf));
        $examData['link_sol'] = $userPdf;
    }

    $db = getDbInstance();

    $last_id = $db->insert('exam', $examData);


    if($last_id)
    {
        $_SESSION['success'] = "New news added successfully!";
        header('location: exam.php');
        exit();
    }
    else die('fail');
}

//We are using same form for adding and editing. This is a create form so declare $edit = false.
$edit = false;
//$db2 = getDbInstance();
//$db2->join("table_users", "admin_id = user_id", "INNER");
//$admin = $db2->get('table_admin', null , 'admin_id, user_name');

require_once './includes/teacher_page_header.php';
?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Thêm Đề Thi: </h2>
            </div>

        </div>
        <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
            <?php  include_once('./forms/exam_form.php'); ?>
        </form>
    </div>

<?php include_once './includes/footer.php'; ?>