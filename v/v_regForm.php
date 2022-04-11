

<?php
if($text){
    echo $text;
}
 
?>







<section class="registration">
    <h2 class="visually-hidden">Join now</h2>
    <div class="container">
        <h1 class="registration__text">
            registration
        </h1>
    </div>
</section>
<section class="content container">
    <div class="content__wrapper">
        <div class="content__wrapper-form">
            <form method="POST" class="content__form">
                <fieldset class="content__group">
                    <legend>Your name</legend>
                    <input class="content__form-name"
                    type="text" 
                    id="name" placeholder="First name" name="firstname" required>
                    <input type="text" id="lastName" class="content__form-name" placeholder="Last name"
                    name="lastname" required>
                    <input type="text" id="lastName" class="content__form-name" placeholder="Login"
                    name="login" required>
                </fieldset>
                <fieldset class="content__radio">
                    <input class="radio-input" type="radio" id="contactChoice1" name="gender" value="male">
                    <label class="radio-label" for="contactChoice1">Male</label>
                    <input class="radio-input" type="radio" id="contactChoice2" name="gender" value="female">
                    <label class="radio-label" for="contactChoice2">Female</label>
                </fieldset>
                <fieldset class="content__group">
                    <legeng>Login details</legeng>
                    <input class="content__form-name" type="text" 
                    id="details" placeholder="Email"
                    name="email">
                    <input type="password" class="content__form-name" placeholder="Password"
                    name="password" required>
                </fieldset>
                <p class="content__text">Please use 8 or more characters, with at least 1 number and a mixture
                    of uppercase and
                    lowercase letters</p>
                <button type="submit" class="content__form-button">Join now <span
                        class="button-arrow">&#8594;</span></button>
            </form>
        </div>
        <div class="content__wrapper-list">
            <h2 class="list-title">loalty has its perks</h2>
            <p class="list-text">Get in on the loyalty program where you can earn points and unlock serious
                perks. Starting with these as soon as you join:</p>
            <ul class="content__list">
                <li class="content__item">15% off welcome offer
                </li>
                <li class="content__item">Free shipping, returns and exchanges on all orders
                </li>
                <li class="content__item">$10 off a purchase on your birthday
                </li>
                <li class="content__item">Early access to products
                </li>
                <li class="content__item">Exclusive offers & rewards
                </li>
            </ul>
        </div>
    </div>
</section>
       