<?php
session_start();
$google_client_id = '815873748416-96fq1snajgu93fqnj4lerkjrgv6biv4c.apps.googleusercontent.com';
$google_client_secret = 'yHv3VsFS37K-KCfs4TJXb7N6';
$google_redirect_url = 'http://eowl.esy.es/login-with-google/'; //path to your script
$google_developer_key = 'AIzaSyA_KA1DSct_rrLFPCzrpK09ZezARm4lHE0';
require_once 'Google/Google_Client.php';
require_once 'Google/contrib/Google_Oauth2Service.php';

$gClient = new Google_Client();
$gClient->setApplicationName( 'Login to Elearning Owl' );
$gClient->setClientId( $google_client_id );
$gClient->setClientSecret( $google_client_secret );
$gClient->setRedirectUri( $google_redirect_url );
$gClient->setDeveloperKey( $google_developer_key );

$google_oauthV2 = new Google_Oauth2Service( $gClient );

//If user wish to log out, we just unset Session variable
if ( isset( $_REQUEST[ 'reset' ] ) ) {
	unset( $_SESSION[ 'token' ] );
	$gClient->revokeToken();
	header( 'Location: ' . filter_var( $google_redirect_url, FILTER_SANITIZE_URL ) ); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if ( isset( $_GET[ 'code' ] ) ) {
	$gClient->authenticate( $_GET[ 'code' ] );
	$_SESSION[ 'token' ] = $gClient->getAccessToken();
	header( 'Location: ' . filter_var( $google_redirect_url, FILTER_SANITIZE_URL ) );
	return;
}


if ( isset( $_SESSION[ 'token' ] ) ) {
	$gClient->setAccessToken( $_SESSION[ 'token' ] );
}


if ( $gClient->getAccessToken() ) {
	//For logged in user, get details from google using access token
	$user = $google_oauthV2->userinfo->get();
	$user_id = $user[ 'id' ];
	$user_name = filter_var( $user[ 'name' ], FILTER_SANITIZE_SPECIAL_CHARS );
	$email = filter_var( $user[ 'email' ], FILTER_SANITIZE_EMAIL );
	$profile_url = filter_var( $user[ 'link' ], FILTER_VALIDATE_URL );
	$profile_image_url = filter_var( $user[ 'picture' ], FILTER_VALIDATE_URL );
	$personMarkup = "$email<div><img src='$profile_image_url?sz=50'></div>";
	$_SESSION[ 'token' ] = $gClient->getAccessToken();
} else {
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}

//ConnectData


if ( isset( $authUrl ) ) //user is not logged in, show login button
{
	header( "Location: " . $authUrl );
} else // user logged in 
{
	//list all user details
	echo '<pre>';
	print_r( $user );
	echo '</pre>';

	$email = $user[ 'email' ];
	$name = $user[ 'name' ];
	$password = md5( $user[ 'id' ] );
	$img = $user[ 'picture' ];
	$school = "";
	$address = "";

	include( '../lib/dbcon.php' );

	$sql = "INSERT INTO `user` (`user_id`, `user_email`, `user_name`, `user_pass`, `user_role`, `user_img`) VALUES (NULL, '" . $email . "', '" . $name . "', '" . $password . "', 'student', '" . $img . "')";

	$sql0 = "select * from user where user_email = '$email'";
	$query0 = mysqli_query( $conn, $sql0 );
	if ( !$query0 ) {
		echo( "Error1: " . mysqli_error( $conn ) );
		exit();
	}
	$data0 = mysqli_fetch_array( $query0, MYSQLI_ASSOC );
	if ( count( $data0 ) ) {
		$_SESSION[ 'user_name' ] = $data0[ 'user_name' ];
		$_SESSION[ 'user_email' ] = $email;

		$_SESSION[ 'user_school' ] = $data0[ 'user_role' ];
		$_SESSION[ 'user_address' ] = $data0[ 'user_role' ];

		$_SESSION[ 'user_img' ] = $img;
		$_SESSION[ 'user_role' ] = $data0[ 'user_role' ];


		$_SESSION[ 'user_id' ] = $data0[ 'user_id' ];
		$id = $data0[ 'user_id' ];
		 
		if ( $data0[ 'user_role' ] == "student" ) {
			$sql2 = "select * from student where student_id = '$id' ";
			$query2 = mysqli_query( $conn, $sql2 );
			$data2 = mysqli_fetch_array( $query2, MYSQLI_ASSOC );
			$_SESSION[ 'user_school' ] = $data2[ 'student_school' ];
			$_SESSION[ 'user_address' ] = $data2[ 'student_address' ];
		}
		switch ( $_SESSION[ 'user_role' ] ) {
			case 'student':
				echo '1';
				break;
			case 'teacher':
			case 'admin':
				echo '2';
				$_SESSION[ 'user_logged_in' ] = TRUE;
				$_SESSION[ 'role' ] = $_SESSION[ 'user_role' ];
				$_SESSION[ 'admin_id_session' ] = 1;
				$_SESSION[ 'u_name' ] = $_SESSION[ 'user_name' ];
				break;
		}
		echo "-1";
		header( "Location: ../home.php" );
		exit();
	}

	$check = $conn->query( $sql );

	if ( $check === TRUE ) {
		$sql = "select * from user where user_email = '$email'";
		$query = mysqli_query( $conn, $sql );
		if ( !$query ) {
			echo( "Error2: " . mysqli_error( $conn ) );
			exit();
		}
		$data = mysqli_fetch_array( $query );
	}

	$inf = "INSERT INTO `student` (`student_id`, `student_school`, `student_address`) VALUES ('" . $data[ 'user_id' ] . "', '" . $school . "', '" . $address . "')";
	if ( ( $check === TRUE ) && ( $conn->query( $inf ) === TRUE ) ) {
		echo "1";
		$sql0 = "select * from user where user_email = '$email'";
		$query0 = mysqli_query( $conn, $sql0 );
		if ( !$query0 ) {
			echo( "Error1: " . mysqli_error( $conn ) );
			exit();
		}
		$data0 = mysqli_fetch_array( $query0, MYSQLI_ASSOC );
		if ( count( $data0 ) ) {
			$_SESSION[ 'user_name' ] = $data0[ 'user_name' ];
			$_SESSION[ 'user_email' ] = $email;

			$_SESSION[ 'user_school' ] = $data0[ 'user_role' ];
			$_SESSION[ 'user_address' ] = $data0[ 'user_role' ];

			$_SESSION[ 'user_img' ] = $img;
			$_SESSION[ 'user_role' ] = $data0[ 'user_role' ];


			$_SESSION[ 'user_id' ] = $data0[ 'user_id' ];
			$id = $data0[ 'user_id' ];
			 
			if ( $data0[ 'user_role' ] == "student" ) {
				$sql2 = "select * from student where student_id = '$id' ";
				$query2 = mysqli_query( $conn, $sql2 );
				$data2 = mysqli_fetch_array( $query2, MYSQLI_ASSOC );
				$_SESSION[ 'user_school' ] = $data2[ 'student_school' ];
				$_SESSION[ 'user_address' ] = $data2[ 'student_address' ];
			}
			switch ( $_SESSION[ 'user_role' ] ) {
				case 'student':
					echo '1';
					break;
				case 'teacher':
				case 'admin':
					echo '2';
					$_SESSION[ 'user_logged_in' ] = TRUE;
					$_SESSION[ 'role' ] = $_SESSION[ 'user_role' ];
					$_SESSION[ 'admin_id_session' ] = 1;
					$_SESSION[ 'u_name' ] = $_SESSION[ 'user_name' ];
					break;
			}
			header( "Location: ../home.php" );
			exit();
		}

	} else {
		echo "Error3: " . $sql . "<br>" . $conn->error;
	}
}
?>