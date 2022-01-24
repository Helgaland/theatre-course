
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
                        unset($_SESSION['aad']);
                    }
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
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
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        

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
                                            <a href="#" class="btn-secondary">Update Theater</a>
                                            <a href="#" class="btn-danger">Delete Theater</a>
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