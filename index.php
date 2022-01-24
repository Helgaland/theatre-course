<?php include('partials-front/menu.php'); ?>

    <!-- theater sEARCH Section Starts Here -->
    <section class="theater-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>theater-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for theater.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- theater sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore theaters</h2>


            <?php
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL; ?>category-theaters.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                                if($image_name=="")
                                {
                                    echo "<div class='error'>Image Not Available</div>";
                                } 
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Theater2" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            
                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Category Not Added.</div>";
                }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Theaters Section Starts Here -->
    <section class="theater-menu">
        <div class="container">
            <h2 class="text-center">Theaters</h2>

                <?php

                $sql2 = "SELECT * FROM tbl_theaters WHERE active='Yes' AND featured='Yes' LIMIT 3";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $date = $row['date'];
                        $place = $row['place'];
                        $image_name = $row['image_name'];
                        $description = $row['description'];
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
                    echo "<div class='error'>Theater Not Available</div>";
                }

                ?>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All theaters</a>
        </p>
    </section>
    <!-- Theaters Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>