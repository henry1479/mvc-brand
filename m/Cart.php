<?php

class Cart {
    // добавляем товар в корзину с аякс запроса
    public function addGoodToCart(string $id)
    {
        // проверка на наличие товара в корзине
        $cart = DB::Select("SELECT good_id FROM cart");
        // пробразуем результат в массив id
        $store = [];
        foreach ($cart as $value) {

            $store[] = $value['good_id'];
        }
        
        // обновляем если id есть в массиве
        if(in_array($id,$store)){
            return $this->updateCountFromCatalog($id);
        }
        // вставляем если иначе
        return DB::Insert("INSERT INTO cart (good_id, count, user_id) VALUES (:good_id,:count,:user_id)",
        [
            "good_id"=> (int) $id,
            "count"=>1,
            "user_id"=>null
        ]);
    }

    // получем товары из корзины
    static function getGoodsFromCart(){
        return DB::Select("SELECT * FROM goods INNER JOIN cart WHERE goods.id = cart.good_id");
    }

    // обновление количества товара из инпута 
    public function updateCountFromInput(string $id, int $count=1){
        return DB::Update("UPDATE `cart` SET count = :count WHERE good_id=:id",
            [
                "count"=>$count,
                "id"=> (int)$id
            ]
            );
    }

    // обновление количества товара из каталога по клику на кнопку
    public function updateCountFromCatalog(string $id){
        return DB::Update("UPDATE `cart` SET count = count+1 WHERE good_id=:id",
            [
                "id"=> (int) $id
            ]
            );
    }

    // установить значение количества в начальное
    public function setDefaultCount(string $id)
    {
        return DB::Update("UPDATE `cart` SET count=1 WHERE good_id=:id",
            [
                "id"=> (int) $id
            ]
            );
    }


    // удаляем товар из корзины
    static function deleteGoodFromCart(string $id) 
    {
        return DB::Delete("DELETE FROM `cart` WHERE good_id =:id",
            [
                "id"=> (int) $id
            ]
        );
    }

    static function createOrder($userId = null, $idData,$phone, $email, $adress)
    {
        return DB::Insert("INSERT INTO `orders`(user_id, good_ids, customer_phone, customer_email, customer_adress) VALUES (:user_id, :ids, :phone, :email, :adress)",
        [
            "user_id" => $userId,
            "ids" => $idData,
            "phone" => $phone,
            "email" => $email,
            "adress"=> $adress
        ]
        );
    }



    


    

    



   
}
