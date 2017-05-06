<?php
    // echo $_POST['comment'];
    session_start();



    if(isset($_POST['username']))
        $_SESSION['username'] = $_POST['username'];

    header('Location: blog_page.php');