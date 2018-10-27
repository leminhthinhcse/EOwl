<?php
$email = $_POST["email"];
$name = $_POST["name"];
$password = md5($_POST["password"]);
$school = $_POST["school"];
$address = $_POST["address"];
$img = "";//$_POST["img"];

if (isset($email) && isset($name) && isset($password) && isset($school) && isset($address)){
    include('../lib/dbcon.php');
	
	$sql = "INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_role`, `user_img`) VALUES (NULL, '". $email ."', '".$name."', '".$password."', 'student', '".$img."')";
	
	$sql0 = "select * from user where user_email = '$email'";
	$query0 = mysqli_query( $conn, $sql0 );
	if ( !$query0 ) {
		echo( "Error1: " . mysqli_error( $conn ) );
		exit();
	}
	$data0 = mysqli_fetch_array( $query0, MYSQLI_ASSOC );
	if ( count( $data0 ) ) {
		echo "-1";
		exit();
	}
	
	$check = $conn->query($sql);
	
	if ( $check === TRUE ) {
		$sql = "select * from user where user_email = '$email'";
		$query = mysqli_query( $conn, $sql );
		if ( !$query ) {
			echo( "Error2: " . mysqli_error( $conn ) );
			exit();
		}
		$data = mysqli_fetch_array( $query );
	}
	
	$inf = "INSERT INTO `student` (`student_id`, `student_school`, `student_address`) VALUES ('".$data[ 'user_id' ]."', '".$school."', '".$address."')";
	if (($check===TRUE)&&($conn->query($inf) === TRUE)) {
		echo "1";
	} else {
		echo "Error3: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
else{
    echo "0";
}
$conn->close();
?>