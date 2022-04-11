<?php 
if($text):?>
<h1><?=$text?></h1>
<?php
endif;
?>


<form action="#" method="POST" enctype="multipart/form-data">
    <label for='user-name'>Введите ваше имя</label>
    <input type="text" name="login" required/>
    <label for='password'>Введите ваш пароль</label>
    <input type="password" name="password" required/>
    <input type="submit" value="войти"/>
</form>

