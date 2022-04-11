<?php

require "./service/DB.class.php";

spl_autoload_register(function($class){
    
    include_once("./c/".$class.".php");  
});


$action = 'action';
$action .= (isset($_GET['act']) ? $_GET['act'] : 'Index');
$data = (isset($_GET['data']) ? $_GET['data'] : null);


switch ($_GET['c'])
{
    case 'page':
        $controller = new C_Page();
        break;
    case 'user':
        $controller = new C_User();
        break;
    case 'catalog':
        $controller = new C_Catalog();
        break;
    case 'cart':
        $controller = new C_Cart();
        break;
    default:
        $controller = new C_Page();
}


$controller -> request($action,$data);
?>