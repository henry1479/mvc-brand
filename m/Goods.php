<?php


class Goods 
{


    // получаем все товары
    public function getGoods()
    {
        $goods = DB::select("SELECT * FROM goods");
        return $goods;
    }
    // получаем товар по Id
    public function getGoodById(string $id)
    {
       
    }

    


}




?>