<?php 

    //
    include('config/constants.php');

    //1. vzemi id-to na admina za premahvane
    $id = $_GET['id'];

    //2. sql querry za iztrivaneto na admina
    $sql = "DELETE FROM tbl_admin WHERE id=$id";
    $res = mysqli_query($conn, $sql);

    //proverka na querryto dali uspeshno e izpulnil deistvieto ili ne
    if($res==TRUE)
    {
        //da
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //ne
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3. vurni operatora v manage admin stranicata sus session suobshtenie


?>