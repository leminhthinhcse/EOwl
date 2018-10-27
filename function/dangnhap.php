<?php

require( "../lib/dbcon.php" );
$username = $_POST[ "username" ];
$password = md5( $_POST[ "password" ] );

$sql = "select * from user where user_email = '$username' and user_pass = '$password' ";
$query = mysqli_query( $conn, $sql );
if (!$query) {
    echo("Error: ".mysqli_error($conn));
    exit();
}
$data = mysqli_fetch_array( $query, MYSQLI_ASSOC );
if ( count( $data ) ) {
	//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
	session_start();
	$_SESSION[ 'user_name' ] = $data[ 'user_name' ];
	$_SESSION['user_email'] = $username;
	
	$_SESSION[ 'user_school' ] = $data[ 'user_role' ];
	$_SESSION[ 'user_address' ] = $data[ 'user_role' ];
	
	$_SESSION[ 'user_img' ] = "./images/erro.png";
	$_SESSION[ 'user_role' ] = $data[ 'user_role' ];
	
		
	$_SESSION[ 'user_id' ] = $data[ 'user_id' ];
	$id = $data[ 'user_id' ];
	if ( $data[ 'user_img' ] != "" )$_SESSION[ 'user_img' ] = $data[ 'user_img' ];
	if ( $data[ 'user_role' ] == "student" ) {
		$sql2 = "select * from student where student_id = '$id' ";
		$query2 = mysqli_query( $conn, $sql2 );
		$data2 = mysqli_fetch_array( $query2, MYSQLI_ASSOC );
		$_SESSION[ 'user_school' ] = $data2[ 'student_school' ];
		$_SESSION[ 'user_address' ] = $data2[ 'student_address' ];
	}
	switch ($_SESSION['user_role']){
		case 'student':
			echo '1';
			break;
		case 'teacher':
		case 'admin':
			echo '2';
			$_SESSION['user_logged_in'] = TRUE;
        $_SESSION['role'] = $_SESSION['user_role'];
        $_SESSION['admin_id_session'] = 1;
        $_SESSION['u_name'] = $_SESSION[ 'user_name' ];
			break;
	}
} else {
	echo '0';
}

$conn->close();
?>