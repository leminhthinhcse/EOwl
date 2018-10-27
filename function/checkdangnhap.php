<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['user_name'])) {
	 echo "1";
	 //alert("Bạn cần đăng nhập để truy cập tính năng này! :)");
}
?>