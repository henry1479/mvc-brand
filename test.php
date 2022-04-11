<?php
require "./service/DB.class.php";
require "./c/C_Cart.php";



$res = (new C_Cart)-> deleteGoodFromCart(2);

echo $res;





