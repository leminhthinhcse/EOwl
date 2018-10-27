<?php
session_start();
require_once './includes/auth_validate_teacher.php';
require_once './config/config.php';
$upload_dir = './pdfOfExam/';
$del_id = filter_input(INPUT_POST, 'del_id');

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'teacher'){
        $_SESSION['failure'] = "You don't have permission to perform this action";
        header('location: exam.php');
        exit;
    }

    $exam_id = $del_id;

    // Xóa ảnh trong folder dưới ở server
    $dbImg = getDbInstance();
    $dbImg->where('exam_id', $exam_id);
    $nameImg = $dbImg->get('exam', null, 'link_de');
    unlink($upload_dir.$nameImg[0]['link_de']);

    $dbImg = getDbInstance();
    $dbImg->where('exam_id', $exam_id);
    $nameImg = $dbImg->get('exam', null, 'link_sol');
    unlink($upload_dir.$nameImg[0]['link_sol']);


    $db = getDbInstance();
    $db->where('exam_id', $exam_id);
    $status = $db->delete('exam');

    if ($status)
    {
        $_SESSION['info'] = "exam deleted successfully!";
        header('location: exam.php');
        exit;
    }
    else
    {
        $_SESSION['failure'] = "Unable to delete exam";
        header('location: exam.php');
        exit;
    }

}