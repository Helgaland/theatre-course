<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br/>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //pokaji krainoto suobshtenie
                unset ($_SESSION['add']); //premahni krainoto suobshtenie
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Full Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    //Izprati Napisanoto ot poletata i go zapazi v bazite danni
    
    //Proveri dali butona submit e natisnat ili ne

    if(isset($_POST['submit']))
    {
        //Vzemi datata ot poletata
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //bez decryption

        ///SQL Querry: Zapazi dannite v bazata
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //3. zadavane na querry i zapazvane na bazite danni, napisani v poletata
        $res = mysqli_query($conn, $sql) or die(mysqli_error($myConnection));

        //4. proveri dali datata e napisana ili ne i pokaji suobshtenie na kraen rezultat
        if($res==TRUE)
        {
            //Suzdavane na variable session za da pokaje suobshtenieto na krainiqt rezultata
            $_SESSION['add'] = "Admin Added Successfully";
            //Redirect page > Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Suzdavane na variable session za da pokaje suobshtenieto na krainiqt rezultata
            $_SESSION['add'] = "Failed to add Admin";
            //Redirect page > Manage Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }


    }
?>