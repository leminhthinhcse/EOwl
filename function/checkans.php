<?php 
$id = $_GET['id'];
session_start();
require("../lib/dbcon.php");
$sql = "select * from exam where exam_id = '$id' ";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);

$a = $_POST["arrAns"];
$_SESSION['your_ans'] = $a;
$_SESSION['s_ans'] = implode(" ",$a);
echo $_SESSION['s_ans'];
$ans = preg_split("/ /",$data['keyExam']);
$result = [];
$i=0;
$point=0;
for ($i = 0; $i < 50; $i++) {
    array_push($result, $a[$i] == $ans[$i]);
	if($result[$i]) $point++;
}
$_SESSION['ans']=$result;
$_SESSION['point']=$point;
				
echo json_encode([
    "code" => 0,
    "data" => $result
  ]);
$conn->close();
?>