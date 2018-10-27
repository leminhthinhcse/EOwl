<?php 
session_start();
require_once './includes/auth_validate.php';
require_once './config/config.php';
$del_id = filter_input(INPUT_POST, 'del_id');
$upload_dir = './imagesOfUsers/';
if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') {
	if($_SESSION['role'] !== 'admin'){
		$_SESSION['failure'] = "You don't have permission to perform this action!";
    	header('location: student.php');
        exit;
    }
    $student_id = $del_id;
    
    // Xóa ảnh trong folder dưới ở server
    $dbImg = getDbInstance();
    $dbImg->where('user_id', $student_id);
    $nameImg = $dbImg->get('user', null, 'user_img');
    unlink($upload_dir.$nameImg[0]['user_img']);

    $db = getDbInstance();
    $db->where('user_id', $student_id);
    $status = $db->delete('user');
    if ($status) {
        $_SESSION['info'] = "student deleted successfully!";
        header('location: student.php');
        exit;
    }
    else{
    	$_SESSION['failure'] = "Unable to delete student";
    	header('location: student.php');
        exit;
    }
}