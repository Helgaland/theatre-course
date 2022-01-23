<?php
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access the admin control.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }    
?>