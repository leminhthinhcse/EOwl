<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';
$upload_dir = './imagesOfNews/';

// Sanitize if you want
$news_id = filter_input(INPUT_GET, 'news_id', FILTER_VALIDATE_INT);
$operation = filter_input(INPUT_GET, 'operation',FILTER_SANITIZE_STRING); 
($operation == 'edit') ? $edit = true : $edit = false;
$db = getDbInstance();
$db2 = getDbInstance();

//Handle update request. As the form's action attribute is set to the same script, but 'POST' method, 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Get student id form query string parameter.
    $news_id = filter_input(INPUT_GET, 'news_id', FILTER_SANITIZE_STRING);

    //Get input data
    $data_to_update = filter_input_array(INPUT_POST);


    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];
    
    if($imgName){
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        $userPic = 'new0'.''.$news_id.'.'.$imgExt;
        //$userPic = $news['news_image'];
        unlink($upload_dir.$data_to_update['news_image']);
        move_uploaded_file($imgTmp, $upload_dir.$userPic);
        $data_to_update['news_image'] = $userPic;
    }


    $db = getDbInstance();
    $db->where('news_id',$news_id);
    //$stat = $db->update('news', $data_to_update);

    if($stat || true)
    {
        $_SESSION['success'] = "News updated successfully!";
        //Redirect to the listing page,
        header('location: news.php');
        //Important! Don't execute the rest put the exit/die. 
        exit();
    }

    
}


//If edit variable is set, we are performing the update operation.
if($edit){
    $db2->join("user", "admin_id = user_id", "INNER");
    $admin = $db2->get('admin', null , 'admin_id, user_name');

    $db->where('news_id', $news_id);
    //Get data to pre-populate the form.
    $news = $db->getOne("news");
}
?>

<?php
    include_once './includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <h2 class="page-header">Cập nhật thông tin của Tin Tức</h2>
    </div>
    <!-- Flash messages -->
    <?php
        include('./includes/flash_messages.php')
    ?>

    <form class="" action="" method="post" enctype="multipart/form-data" id="contact_form">
        
        <?php
            //Include the common form for add and edit  
            require_once('./forms/news_form.php'); 
        ?>
    </form>
</div>

<?php include_once 'includes/footer.php'; ?>