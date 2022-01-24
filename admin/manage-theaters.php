
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Theaters</h1>

        <br/><br/><br/>
                
                <!-- Button to add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-theater.php" class="btn-primary">Add Theater</a>

                <br/><br/><br/>

                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauth']))
                    {
                        echo $_SESSION['unauth'];
                        unset($_SESSION['unauth']);
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Place</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                    
                        $sql = "SELECT * FROM tbl_theaters";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $sn=1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $date = $row['date'];
                                $place = $row['place'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $place; ?></td>
                                        

                                        <td>
                                            <?php 
                                                if($image_name!="")
                                                {
                                                    ?>
                                                    
                                                        <img src="<?php echo SITEURL; ?>images/theaters/<?php echo $image_name; ?>" width="140px" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-theater.php?id=<?php echo $id; ?>" class="btn-secondary">Update Theater</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-theater.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Theater</a>
                                        </td>
                                    </tr>

                                <?php
                            }

                        }
                        else
                        {
                            echo "<tr> <td colspan='7' class='error'> No Theaters Added. </td> </tr>";
                        }
                                
                    ?>

                </table>
        
    </div>
</div>

<?php include('partials/footer.php'); ?>