<?php
print_r($goods); 
?>



<section class="registration shopping-cart">
    <h2 class="visually-hidden">Join now</h2>
    <div class="container">
        <h1 class="registration__text shopping-cart__header ">
            shopping cart
        </h1>
    </div>
</section>
<section class="cart-content container">
    <h2 class="cart-content__title visually-hidden">Your choise</h2>
    <div class="cart-content__common-wrapper">
        
        <div class="cart-content__wrapper">
        <?php 
            if(empty($goods)){?>
            <h2>The Cart is Empty!</h2>
            
         <?php } 
         else {
            foreach($goods as $good) :
        ?>
            <ul class="cart-content__list">
                
                <li class="cart-content__item">
                    <img src="./img/<?=$good['image']?>" alt="polo" class="cart-content__image" width="262px"
                        height="306">
                    <ul class="cart-content__sublist">
                        <h3 class="cart-content__subtitle"><?=$good['name']?></h3>
                        <li class="cart-content__subitem">
                            Price: <span class="cart-content__value cart-content__value--pink"><?=$good['price']?></span>
                        </li>
                        <li class="cart-content__subitem">
                            Color:<span class="cart-content__value">Red</span>
                        </li>
                        <li class="cart-content__subitem">
                            Size: <span class="cart-content__value">XI</span>
                        </li>
                        <li class="cart-content__subitem">
                            Quiantity:<span class="cart-content__value"><input type="number"  value=<?= $good['count']?>
                                    class="cart-content__quantity" id="<?=$good['good_id']?>" min=1 max=999/></span>
                        </li>
                    </ul>
                </li>
                <li class="cart-content__item">
                    <a class="cart-content__cross" href="index.php?c=cart&act=Delete&data=<?=$good['good_id'];?>">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.4158 6.00409L11.7158 1.71409C11.9041 1.52579 12.0099 1.27039 12.0099 1.00409C12.0099 0.73779 11.9041 0.482395 11.7158 0.294092C11.5275 0.105788 11.2721 0 11.0058 0C10.7395 0 10.4841 0.105788 10.2958 0.294092L6.0058 4.59409L1.7158 0.294092C1.52749 0.105788 1.2721 -1.9841e-09 1.0058 0C0.739497 1.9841e-09 0.484102 0.105788 0.295798 0.294092C0.107495 0.482395 0.0017066 0.73779 0.0017066 1.00409C0.0017066 1.27039 0.107495 1.52579 0.295798 1.71409L4.5958 6.00409L0.295798 10.2941C0.20207 10.3871 0.127676 10.4977 0.0769072 10.6195C0.0261385 10.7414 0 10.8721 0 11.0041C0 11.1361 0.0261385 11.2668 0.0769072 11.3887C0.127676 11.5105 0.20207 11.6211 0.295798 11.7141C0.388761 11.8078 0.499362 11.8822 0.621222 11.933C0.743081 11.9838 0.873786 12.0099 1.0058 12.0099C1.13781 12.0099 1.26852 11.9838 1.39038 11.933C1.51223 11.8822 1.62284 11.8078 1.7158 11.7141L6.0058 7.41409L10.2958 11.7141C10.3888 11.8078 10.4994 11.8822 10.6212 11.933C10.7431 11.9838 10.8738 12.0099 11.0058 12.0099C11.1378 12.0099 11.2685 11.9838 11.3904 11.933C11.5122 11.8822 11.6228 11.8078 11.7158 11.7141C11.8095 11.6211 11.8839 11.5105 11.9347 11.3887C11.9855 11.2668 12.0116 11.1361 12.0116 11.0041C12.0116 10.8721 11.9855 10.7414 11.9347 10.6195C11.8839 10.4977 11.8095 10.3871 11.7158 10.2941L7.4158 6.00409Z"
                                fill="#6F6E6E" />
                        </svg>
                    </a>
                </li>
            </ul>
            <?php
                endforeach;
            }
            ?>
            <div class="cart-content__buttons-wrapper">
                <button type="button" class="cart-content__reset">Clear shopping-cart</button>
                <a href="./index.php?c=cart&Order" class="cart-content__redirect">Make order</a>
            </div>
        </div>
        <div class=" cart-content__wrapper cart-content__wrapper--right">
            <form action="#" method="POST" class="cart-content__form">
                <fieldset class="cart-content__group">
                    <legend class="cart-content__form-title">shipping adress</legend>
                    <input class="cart-content__form-country" type="text" id="country" placeholder="Bangladesh">
                    <input type="text" id="state" class="cart-content__form-country" placeholder="Last name"
                        value="State">
                    <input class="cart-content__form-country" type="text" id="code" value="Postcode / Zip">

                </fieldset>
                <button type="submit" class="cart-content__form-button">Get a quote </button>
            </form>
            <?php
                $sum = 0;
                foreach($goods as $good) {
                    $goodPrice = (int)$good['price'] * (int)$good['count'];
                    $sum += $goodPrice;
                }
            ?>
            <div class="cart-content__checkout">
                <div class="cart-content__checkout-price">
                    <p class="cart-content__final-subprice">sub total<span
                            class="cart-content__final-subprice--value"><?=$sum?></span></p>
                    <p class="cart-content__final-price">grand total<span
                            class="cart-content__final-price--value"><?=$sum?></span></p>
                </div>
                <div class="cart-content__checkout-wrapper">
                    <button type="button" class="cart-content__checkout-button">
                        proceed to checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
