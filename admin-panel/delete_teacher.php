<?php 
session_start();
require_once './includes/auth_validate.php';
require_once './config/config.php';
$upload_dir = './imagesOfUsers/';
$link_exam = './pdfOfExam/';

$del_id = filter_input(INPUT_POST, 'del_id');

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {

	if($_SESSION['role'] !== 'admin'){
		$_SESSION['failure'] = "You don't have permission to perform this action!";
    	header('location: teacher.php');
        exit;
    }
    $teacher_id = $del_id;
    // Xóa các đề và sol của đề mà teacher đã đăng lên

    $db = getDbInstance();
    $db->where('created_by', $teacher_id);
    $select = array('link_de', 'link_sol');
    $exams = $db->get('exam', null, $select);
    foreach ($exams as $exam){
        unlink($link_exam.$exam['link_de']);
        unlink($link_exam.$exam['link_sol']);
    }

    // Xóa ảnh trong folder dưới ở server
    $dbImg = getDbInstance();
    $dbImg->where('user_id', $teacher_id);
    $nameImg = $dbImg->get('user', null, 'user_img');
    unlink($upload_dir.$nameImg[0]['user_img']);

    $db1 = getDbInstance();
    $db1->where('user_id', $teacher_id);
    $status = $db1->delete('user');

    if ($status) {
        $_SESSION['info'] = "teacher deleted successfully!";
        header('location: teacher.php');
        exit;
    }
    else{
    	$_SESSION['failure'] = "Unable to delete teacher";
    	header('location: teacher.php');
        exit;
    }
    
}