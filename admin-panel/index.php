<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate.php';

//Get DB instance. function is defined in config.php
$db = getDbInstance();

//Get Dashboard information

$numTeacher = $db->getValue ("teacher", "count(*)");
$numStudent = $db->getValue ("student", "count(*)");
$numNews = $db->getValue ("news", "count(*)");
$db->where("not user_role = 'admin'");
$numCustomers = $db->getValue ("user", "count(*)");
include_once('./includes/header.php');
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
                            <div class="huge"><?php echo $numCustomers; ?></div>
                            <div>Users</div>
                        </div>
                    </div>
                </div>
                <a href="user.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user-circle fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numTeacher; ?></div>
                            <div>Teachers</div>
                        </div>
                    </div>
                </div>
                <a href="teacher.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-graduation-cap fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numStudent; ?></div>
                            <div>Students</div>
                        </div>
                    </div>
                </div>
                <a href="student.php">
                    <div class="panel-footer">
                        <span class="pull-left">Xem chi tiết</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
        
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-newspaper-o fa-4x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $numNews; ?></div>
                            <div>Quản Lý Tin Tức</div>
                        </div>
                    </div>
                </div>
                <a href="news.php">
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
