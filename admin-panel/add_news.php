<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfNews/';

//serve POST method, After successful insert, redirect to customers.php page.
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = filter_input_array(INPUT_POST);
    //Insert timestamp
    //$data_to_store['created_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $max_id = $db->getValue ("news", "max(news_id)");
    $news_id = $max_id + 1;

    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];
    
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'new0'.''.$news_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
        unlink($upload_dir.$data_to_store['news_image']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $data_to_store['news_image'] = $userPic;
    }

    $db = getDbInstance();
    $last_id = $db->insert ('news', $data_to_store);
    
    if($last_id)
    {
    	$_SESSION['success'] = "New news added successfully!";
    	header('location: news.php');
    	exit();
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
            <h2 class="page-header">Thêm Tin Tức: </h2>
        </div>
            
    </div>
    <form class="form" action="" method="post"  id="customer_form" enctype="multipart/form-data">
       <?php  include_once('./forms/news_form.php'); ?>
    </form>
</div>

<?php include_once './includes/footer.php'; ?>