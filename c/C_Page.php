<?php
include_once('C_Base.php');
include_once('m/Goods.php');
include_once('m/Cart.php');





class C_Page extends C_Base
{   
    public function actionIndex() 
    {    
        $goods = (new Goods)->getGoods();
       
        $this->content = $this->template('v/v_content.php', 
            array(
                
                'feedbacks'=>array(['user_name'=> 'Vasya', 'fill' => 'I am good']), 
                'goods'=> $goods
            )
        );
    }

    

}



?>