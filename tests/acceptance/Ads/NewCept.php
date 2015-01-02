<?php 
// Параметры объявления
$title = 'Новое объявление '.rand(10000,9999999);

$I = new AcceptanceTester($scenario);
$I->wantTo('Add new ad');
$I->amOnPage('/');
$I->click('a#addAd');
$I->see('Дать объявление','h1');
$I->fillField('title', $title);
$I->fillField('city', 'Харьков');
$I->waitForElement('ul.ui-autocomplete li', 30);
$I->click('Харьков, Харьковская обл, Украина');
$I->selectOption('Категория', '1');
$I->waitForElement('#childcat select', 30);
$I->see('Подкатегория','label span');
$I->selectOption('Подкатегория', '7');
$I->fillField('description', 'Test description');

//Дополнительные параметры
$I->waitForElement('#customcont label', 30);
$I->selectOption('Район', '1');
$I->selectOption('Метро', '1');
$I->selectOption('Комнат', '1');
$I->selectOption('Тип квартиры', '1');
$I->fillField('gross_area', '33');
$I->fillField('living_space', '17');
$I->fillField('kitchen_area', '6');
$I->fillField('floor', '2');
$I->fillField('floors', '5');


$I->fillField('price', '1000');
$I->selectOption('valute', '1');
$I->fillField('fullname', 'Александр');
$I->fillField('telephone', '0661111111');
$I->fillField('email', 'klik1301@ya.ru');
$I->click('#submitbutton');

//Status
$I->see('Ваше объявление добавлено, но НЕ АКТИВИРОВАНО, на ваш E-mail было отправлено сообщение для активации объявления','ul.statusMSG li');

//Login
$I->click('Мои объявления');
$I->fillField('username', 'klik1301@ya.ru');
$I->fillField('password', '111111');
$I->click('#submitbutton');
$I->see('Мои объявления','h1');

// Переход на скрытые объявления
$I->click('.stat2count');
$I->see($title,'h4 a');
$I->moveMouseOver('.spr_red');
$I->click('.spr_korzina'); // В корзину
$I->acceptPopup();

// Переход в корзину
$I->waitForElement('.stat3count', 30);
$I->click('.stat3count');
$I->see($title,'h4 a');



   
