<?php
    if($_GET['data']) 
    {
        
        $_SESSION['cart'][] = $_GET['data'];

        print_r($_SESSION);

    }
