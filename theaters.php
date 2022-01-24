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



    <!-- Theaters Section Starts Here -->
    <section class="theater-menu">
        <div class="container">
            <h2 class="text-center">Theaters</h2>

            
                <?php

                $sql2 = "SELECT * FROM tbl_theaters WHERE active='Yes'";

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

    </section>
    <!-- Theaters Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>