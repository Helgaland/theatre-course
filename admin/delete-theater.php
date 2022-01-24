<?php

    include('config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/theaters/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Theater Image.</div>";
                header('location:'.SITEURL.'admin/manage-theaters.php');
                die();
            }
        }

        $sql = "DELETE FROM tbl_theaters WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Theater Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-theaters.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Theater.</div>";
            header('location:'.SITEURL.'admin/manage-theaters.php');
        }

    }
    else
    {
        $_SESSION['unauth'] = "<div class='error'>No Access.</div>";
        header('location:'.SITEURL.'admin/manage-theaters.php');
    }

?>