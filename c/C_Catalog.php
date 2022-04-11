<?php

include_once('C_Base.php');
include_once('m/Goods.php');


class C_Catalog extends C_Base
{   
    public function actionIndex() 
    {   
        $goods = (new Goods)->getGoods();
        $this->content = $this->template('v/v_catalog.php', 
            array(
                'catalog_goods'=> $goods
            )
        );
    }
}