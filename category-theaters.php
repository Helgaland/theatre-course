<?php include('partials-front/menu.php'); ?>

<?php 

    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];

    }
    else
    {
        header('location'.SITEURL);
    }

?>

    <!-- theater sEARCH Section Starts Here -->
    <section class="theater-search text-center">
        <div class="container">
            
            <h2>Theaters on <a href="#" class="text-white">"<?php echo $category_title ?>"</a></h2>

        </div>
    </section>
    <!-- theater sEARCH Section Ends Here -->



    <!-- theater MEnu Section Starts Here -->
    <section class="theater-menu">
        <div class="container">
            <h2 class="text-center">Theater Menu</h2>

            <?php

                $sql2 = "SELECT * FROM tbl_theaters WHERE category_id=$category_id";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $date = $row2['date'];
                        $place = $row2['place'];
                        $image_name = $row2['image_name'];
                        $description = $row2['description'];
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

    </section>
    <!-- theater Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>