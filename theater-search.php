<?php include('partials-front/menu.php'); ?>

    <!-- theater sEARCH Section Starts Here -->
    <section class="theater-search text-center">
        <div class="container">
            <?php

                $search = $_POST['search'];

            ?>
            
            <h2 style="color: yellow;">Theaters on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- theater sEARCH Section Ends Here -->



    <!-- Theaters Section Starts Here -->
    <section class="theater-menu">
        <div class="container">
            <h2 class="text-center">Theaters</h2>

            <?php 

                $sql = "SELECT * FROM tbl_theaters WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR place LIKE '%$search%'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

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
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                            <div class="theater-menu-box">
                                <div class="theater-menu-img">
                                    <?php
                                    if($image_name=="")
                                    {  
                                        echo "<div class='error'>Image Not Available</div>";
                                    } 
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/theaters/<?php echo $image_name; ?>" alt="Theater2" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>
                                </div>

                                <div class="theater-menu-desc">
                                    <h4><?php echo $title; ?> - <?php echo $date; ?></h4>
                                    <p class="theater-price">$<?php echo $price; ?></p>
                                    <p class="theater-price">Place: <?php echo $place; ?></p>
                                    <p class="theater-detail">
                                        <?php echo $description; ?>
                                    </p>
                                    <br>

                                    <a href="theaters.php" class="btn btn-primary">Information</a>
                                </div>
                            </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'> Theater Not Found.</div>";
                }
            ?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- Theaters Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>