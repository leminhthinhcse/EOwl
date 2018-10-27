<?php 
session_start();
require_once './includes/auth_validate.php';
require_once './config/config.php';
$upload_dir = './imagesOfNews/';
$del_id = filter_input(INPUT_POST, 'del_id');

if ($del_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['role'] !== 'admin'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: news.php');
        exit;
    }
    
    $news_id = $del_id;
    
    // Xóa ảnh trong folder dưới ở server
    $dbImg = getDbInstance();
    $dbImg->where('news_id', $news_id);
    $nameImg = $dbImg->get('news', null, 'news_image');
    unlink($upload_dir.$nameImg[0]['news_image']);

    $db = getDbInstance();
    $db->where('news_id', $news_id);
    $status = $db->delete('news');
    
    if ($status) 
    {
        $_SESSION['info'] = "news deleted successfully!";
        header('location: news.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to delete news";
    	header('location: news.php');
        exit;
    }
    
}