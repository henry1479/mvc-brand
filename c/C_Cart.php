

<?php

include_once('C_Base.php');
include_once('m/Cart.php');
include_once('m/Goods.php');


class C_Cart extends C_Base
{

    protected $goods;


    public function __construct()
    {
        $this->goods = Cart::getGoodsFromCart();
    }

    
    

    //выводим корзину с товарами
    public function actionIndex() 
    {    
       

        
        $this->content = $this->template('v/v_cart.php', 
            array(
                'goods'=> $this->goods
            )
        );
    }

    // удаление товара из корзины по id
    public function actionDelete(string $id)
    {
        Cart::deleteGoodFromCart($id);
        header("Location:index.php?c=cart&action=Index");
        
    }


    public function actionOrder(string $adress, string $tel)
    {
        
    }








    

}
