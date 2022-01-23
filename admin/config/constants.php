<?php
        //startirai sesiq
        session_start();

        //Konstant za suhranenie na povtarqshti se valuti, napisnati ot potrebitelq
        define('SITEURL', 'https://localhost/theatre-course/');
        define('LOCALHOST', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'theater-ticket');

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($myConnection));
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($myConnection));


?>