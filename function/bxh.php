<?php 

require( "./lib/dbcon.php" );

$sql = "SELECT user.user_name, record.key_dalam, exam.keyExam, user.user_img, user.user_id, record.idExam, exam.subject FROM record INNER JOIN exam ON exam.exam_id= record.idExam INNER JOIN user ON user.user_id= record.idStudent ORDER BY `user`.`user_name` ASC";
$query = mysqli_query( $conn, $sql );

function diem( $a,$ans ) {
	$i = 0;
	$point = 0;
	for ( $i = 0; $i < 50; $i++ ) {
		if ( $a[ $i ] == $ans[ $i ] ) $point++;
	}
	return $point/5;
}

$bxh = array();

$data = mysqli_fetch_array( $query, MYSQLI_ASSOC ); 
$pre_data= $data; array_push($pre_data,0);
while ( $data ) {
	
	$a = preg_split("/ /",$data['key_dalam']);
	$ans = preg_split("/ /",$data['keyExam']);
	array_push($data, diem($a,$ans));
	if($data['user_id'] == $pre_data['user_id']){
		if($pre_data[0] < $data[0]) $pre_data = $data;
	} else {
		array_push($bxh,$pre_data);
		//echo $pre_data['user_id']."<br/>";
		$pre_data = $data;
	}
	
	
	$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
	
}

$_SESSION['bxhs'] = $bxh;
$conn->close();
?>