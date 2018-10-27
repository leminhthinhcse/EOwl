<?php
require_once './config/config.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $username = filter_input(INPUT_POST, 'username');
    $passwd = filter_input(INPUT_POST, 'passwd');
    $remember = filter_input(INPUT_POST, 'remember');
    $passwd=  md5($passwd);

    //Get DB instance. function is defined in config.php
    $db = getDbInstance();

    $db->where ("user_email", $username);
    $db->where ("user_pass", $passwd);
    $row = $db->get('user');

    if ($db->count >= 1) {
        $_SESSION['user_logged_in'] = TRUE;
        $_SESSION['role'] = $row[0]['user_role'];
        $_SESSION['user_id']= $row[0]['user_id'];
        $_SESSION['admin_id_session'] = 1;
        $_SESSION['u_name'] = $row[0]['user_name'];
        if($remember)
        {
            setcookie('username',$username , time() + (86400 * 90), "/");
            setcookie('password',$passwd , time() + (86400 * 90), "/");
        }
        if( $row[0]['user_role'] == 'admin') {
            header('Location:index.php');
        }
        else if( $row[0]['user_role'] == 'teacher') {
            header('Location:teacher_page.php');
        }
        else{
            header('Location:logout.php');
        }
        exit;
    } else {
        $_SESSION['login_failure'] = "Invalid user name or password";
        header('Location:login.php');
        exit;
    }

}