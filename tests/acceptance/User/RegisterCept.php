<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('Sign up');
$I->amOnPage('/');
$I->click('Мои объявления');
$I->see('Регистрация','a');
$I->click('Регистрация');
$I->see('Регистрация на сайте','h1');
$I->fillField('email', 'klik1301@ya.ru');
$I->fillField('password', '111111');
$I->fillField('password2', '111111');
$I->click('#submitbutton');
$I->see('Замена пароля. На ваш E-mail было отправлено письмо для подтверждения замены пароля','ul.statusMSG li');



