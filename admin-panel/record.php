<?php
session_start();
require_once './config/config.php';
require_once './includes/auth_validate_teacher.php';
$upload_dir = './pdfOfExam/';
//Get Input data from query string
$exam_id = filter_input(INPUT_GET, 'exam_id', FILTER_VALIDATE_INT);


$db1 = getDbInstance();
$db1->where('exam_id',$exam_id);
$row = $db1->get('exam');

$db2 = getDbInstance();
$db2->where('idExam',$exam_id);
$records = $db2->get('record');

$j=0;
$numExcellent = 0; // >= 9
$numGood = 0; // >= 8
$numFair = 0; // >= 6.5
$numNormal = 0; // >= 5
$numBad = 0; // < 5
$numExam = 0;
foreach ($records as $record) {
    $mark[$j] = 0;
    for($i = 0;$i <50;$i++){
        if ($record['key_dalam'][$i*2]==$row[0]['keyExam'][$i*2]) $mark[$j]+=0.2;
    }
    $numExam += 1;
    if ($mark[$j] >= 9) $numExcellent += 1;
    else if ($mark[$j] >= 8) $numGood += 1;
    else if ($mark[$j] >= 6.5) $numFair += 1;
    else if ($mark[$j] >= 5) $numNormal += 1;
    else $numBad += 1;
    $j+=1;
}

include_once './includes/teacher_page_header.php';
?>

<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Đề Thi Hiện Tại</h1>
        </div>

    </div>

    <?php include('./includes/flash_messages.php') ?>


    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata">
        <thead>
        <tr>
            <th class="header">ID</th>
            <th>Tên</th>
            <th>Môn</th>
            <th>Năm</th>
            <th>Đề</th>
            <th>Th.gian</th>
            <th>Đáp án</th>
            <th>Tạo bởi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $row[0]['exam_id'] ?></td>
            <td><?php echo htmlspecialchars($row[0]['exam_name']) ?> </td>
            <td><?php echo htmlspecialchars($row[0]['subject']) ?></td>
            <td><?php echo htmlspecialchars($row[0]['year']) ?></td>
            <td><a target="_blank" href=" <?php echo htmlspecialchars($upload_dir.$row[0]['link_de']) ?>"><?php echo htmlspecialchars($row[0]['link_de']) ?></a> </td>
            <td><?php echo htmlspecialchars($row[0]['time']) ?> </td>
            <td><?php echo htmlspecialchars($row[0]['keyExam']) ?> </td>
            <?php
            $db1 = getDbInstance();
            $db1->where('user_id',$row[0]['created_by']);
            $user = $db1->get('user');
            ?>
            <td><?php echo htmlspecialchars($user[0]['user_email']) ?> </td>
        </tr>
        </tbody>
    </table>
    <hr>

    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Thống Kê</h1>
        </div>

    </div>

    <label>Điểm >= 9 :</label>
    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" style="width: <?php echo $numExcellent*100/$numExam ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $numExcellent*100/$numExam ?>%</div>
    </div>
    <label>Điểm >= 8 :</label>
    <div class="progress">
        <div class="progress-bar progress-bar-info" role="progressbar" style="width: <?php echo $numGood*100/$numExam ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $numGood*100/$numExam ?>%</div>
    </div>
    <label>Điểm >= 6.5 :</label>
    <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $numFair*100/$numExam ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $numFair*100/$numExam ?>%</div>
    </div>
    <label>Điểm >= 5 :</label>
    <div class="progress">
        <div class="progress-bar progress-bar-warning" role="progressbar" style="width: <?php echo $numNormal*100/$numExam ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $numNormal*100/$numExam ?>%</div>
    </div>
    <label>Điểm < 5 :</label>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" style="width: <?php echo $numBad*100/$numExam ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $numBad*100/$numExam ?>%</div>
    </div>
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Kết Quả Làm Bài</h1>
        </div>

    </div>



    <table class="table table-striped table-bordered table-condensed table-hover" id="mydata2">
        <thead>
        <tr>
            <th class="header">ID</th>
            <th>Thí sinh</th>
            <th>Email</th>
            <th>Điểm</th>
            <th>Đáp án đã chọn</th>
            <th>Ngày giờ làm bài</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; foreach ($records as $record) : ?>
            <tr>
                <?php
                $db2 = getDbInstance();
                $db2->where('user_id',$record['idStudent']);
                $user = $db2->get('user');
                ?>
                <td><?php echo $record['record_id'] ?></td>
                <td><?php echo htmlspecialchars($user[0]['user_name']) ?> </td>
                <td><?php echo htmlspecialchars($user[0]['user_email']) ?></td>

                <td><?php echo htmlspecialchars($mark[$x]) ?></td>
                <td><?php echo htmlspecialchars($record['key_dalam']) ?></td>
                <td><?php echo htmlspecialchars($record['exam_date']) ?> </td>

            </tr>

        <?php $x+=1; endforeach; ?>
        </tbody>
    </table>

    <hr>
    <hr>

    

</div>
<!--Main container end-->


<?php include_once './includes/footer.php'; ?>

