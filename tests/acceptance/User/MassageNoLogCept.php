<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('write massage as no login');
$I->amOnPage('/');

//Login
$I->click('Продажа квартир');
$I->click('Новое рег-объявление 3866003');
$I->click('Написать автору');
$I->fillField('Ваше имя', 'Оля');
$I->fillField('Ваш E-mail', 'a@mfgfg.rfgg');
$I->fillField('comment', 'kfjgfgjlkfd');
$I->click('Отправить сообщение');
$I->wait(15);
$I->see('Необходимо зарегистрироваться и авторизаться на сайте, чтобы отправлять письма');
