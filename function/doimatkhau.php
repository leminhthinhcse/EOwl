<?php
session_start();

$curpas = md5($_POST[ "curpas" ]);
$newpass = md5($_POST[ "newpass" ]);

include( '../lib/dbcon.php' );

$update_pas = "UPDATE `user` SET `user_pass` = '".$newpass."' WHERE `user`.`user_id` = ".$_SESSION['user_id'].";";

$sql = "select * from user where user_id = '".$_SESSION['user_id']."' and user_pass = '".$curpas."' ";
$query = mysqli_query( $conn, $sql );
if (!$query) {
    echo("Error: ".mysqli_error($conn));
    exit();
}
$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
if ( count( $data ) ) {
	$check = $conn->query( $update_pas );
	if($check){
		echo '1';
	} else {
		echo "Lỗi: " . $sql . "<br>" . $conn->error;
	}	
} else {
	echo '0';
}

$conn->close();

?>