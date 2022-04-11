<?php
include_once('C_Controller.php');
include_once('./m/User.php');
include_once('./m/Cart.php');

// базовый класс сайта

abstract class C_Base extends C_Controller 
{
    protected $title; // заголовок страницы
    protected $content; //  содержание страницы


    protected function before() {
        $this -> title = 'Brand Shop ';
        $this -> content = '';
    }


    // работа с асинхронными запросами
    protected function provider()
    {
        $cart = new Cart();
        // добавляем товар в корзину
        if($_GET['addCart']) 
        {
            $cart->addGoodToCart($_GET['addCart']);
            // получаем товары из корзины
            // для обновления счетчика в шапке
            // без перезагрузки страницы
            $res = Cart::getGoodsFromCart();
            echo count($res);
        }

        // изменяем количество товара из инпута
        if($_GET['cartId'] && $_GET['cartCount']) 
        {
            $id = $_GET['cartId'];
            $count = $_GET['cartCount'];
            $cart -> updateCountFromInput($id, $count);
            
        }
    }

    

    // генерация базвового шаблона

    public function render() { 
        $user = new User();
        session_start();
        // получаем данные о пользователе
        // если он авторизован
        if(isset($_SESSION['user_id'])) {
            $userInfo = $user->getUser($_SESSION['user_id']);
        } else {
            $userInfo['login'] = false;
        }
        // получаем товары из корзины для обновления счетчика в шапке
        $cart = Cart::getGoodsFromCart();

        
       


        $vars = array(
            'cart' => count($cart),
            'title' => $this->title,
            'content'=>$this->content, 
            'user' => $userInfo['login'],
            // 'countCart' => $countCart
        
        );
        $page = $this->template('v/v_body.php', $vars);

       
        echo $page;
    }
}


?>