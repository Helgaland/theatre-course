
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br>
            
        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //pokaji krainoto suobshtenie
                unset ($_SESSION['add']); //premahni krainoto suobshtenie
            }
        ?>

        <br><br>
                <!-- Button to add Admin -->
                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>

                <br/><br/><br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <!--Marin Vasilev-->
                    <tr>
                        <td>1. </td>
                        <td>Marin Vasilev</td>
                        <td>Blitzzer</td>
                        <td>
                            <a href="#" class="btn-secondary">Update Admin</a>
                            <a href="#" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>

                    <!--Marin Vasilev-->
                    <tr>
                        <td>1. </td>
                        <td>Marin Vasilev</td>
                        <td>Blitzzer</td>
                        <td>
                            <a href="#" class="btn-secondary">Update Admin</a>
                            <a href="#" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>

                    <!--Marin Vasilev-->
                    <tr>
                        <td>1. </td>
                        <td>Marin Vasilev</td>
                        <td>Blitzzer</td>
                        <td>
                            <a href="#" class="btn-secondary">Update Admin</a>
                            <a href="#" class="btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>