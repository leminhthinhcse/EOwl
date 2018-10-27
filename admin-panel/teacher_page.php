<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate_teacher.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information

$numExam = $db->where('created_by',$_SESSION['user_id'])->getValue ("exam", "count(*)");

include_once('./includes/teacher_page_header.php');
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Bảng điều khiển</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numExam; ?></div>
                            <div>Đề thi</div>
                        </div>
                    </div>
                </div>
                <a href="exam.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">

            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">

            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php include_once('./includes/footer.php'); ?>
