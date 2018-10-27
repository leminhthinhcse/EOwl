<?php

//If User is logged in the session['user_logged_in'] will be set to true

//if user is Not Logged in, redirect to login.php page.
if ($_SESSION['role'] != 'teacher' ) {
	header('Location:login.php');
}
 ?>