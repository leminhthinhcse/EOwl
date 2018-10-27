<?php 
	 session_start();
     unset($_SESSION['user_name']); // Huỷ session name
     session_destroy(); // Huỷ tất cả session
	 header('Location: ../index.php');
?>