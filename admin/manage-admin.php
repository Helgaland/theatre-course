
<?php include('partials/menu.php'); ?>
        
        <!-- Main Content Section Startira -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                
                <br/>
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //pokaji krainoto suobshtenie
                        unset($_SESSION['add']); //premahni krainoto suobshtenie
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //pokaji krainoto suobshtenie
                        unset($_SESSION['delete']); //premahni krainoto suobshtenie
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    
                    if(isset($_SESSION['incorrect-password']))
                    {
                        echo $_SESSION['incorrect-password'];
                        unset($_SESSION['incorrect-password']);
                    }
                    
                    if(isset($_SESSION['changed-password']))
                    {
                        echo $_SESSION['changed-password'];
                        unset($_SESSION['changed-password']);
                    }
                    
                    if(isset($_SESSION['failed-password']))
                    {
                        echo $_SESSION['failed-password'];
                        unset($_SESSION['failed-password']);
                    }


                ?>
                <br/><br/>
                <!-- Button to add Admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br/><br/><br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>


                    <?php
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count = mysqli_num_rows($res);

                            if($count>0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    ?>

                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                            else
                            {

                            }
                        }
                    ?>
                    
                </table>
            </div>
        </div>
        <!-- Main Content Section Prikluchva -->

<?php include('partials/footer.php'); ?>