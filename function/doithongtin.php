<?php
session_start();

$name = $_POST[ "name" ];
$school = $_POST[ "school" ];
$address = $_POST[ "address" ];
$img = ""; //$_POST["img"];
$i=0; $k=0;

include( '../lib/dbcon.php' );

$update_name = "UPDATE `user` SET `user_name` = '" . $name . "' WHERE `user`.`user_id` = " . $_SESSION[ 'user_id' ] . ";";

$update_school = "UPDATE `student` SET `student_school` = '" . $school . "' WHERE `student`.`student_id` = " . $_SESSION[ 'user_id' ] . ";";

$update_address = "UPDATE `student` SET `student_address` = '" . $address . "' WHERE `student`.`student_id` = " . $_SESSION[ 'user_id' ] . ";";

if ( $name !="" ) {
	$k++;
	$check = $conn->query( $update_name );
	if($check){
		$i++;
		$_SESSION['user_name'] = $name;
	}
}

if ( $school !="" ) {
	$k++;
	$check = $conn->query( $update_school );
	if($check){
		$i++;
		$_SESSION['user_school'] = $school;
	}
}

if ( $address !="" ) {
	$k++;
	$check = $conn->query( $update_address );
	if($check){
		$i++;
		$_SESSION['user_address'] = $address;
	}
}

if ( !$i) {
	echo "0";
} else if ($i===$k){
	echo "1";
}
else {
	echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>