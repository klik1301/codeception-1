<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('choose the price');
$I->amOnPage('/');

//Login
$I->click('Мои объявления');
$I->fillField('username', 'tifani.bc@mail.ru');
$I->fillField('password', 'objavlenie');
$I->click('#submitbutton');//для id
$I->see('Мои объявления');

//Create ad
$I->click('Дать объявление');
$I->fillField('title','Ford');
$I->fillField('city', 'Харьков');
$I->waitForElement('ul.ui-autocomplete li', 30);
$I->click('Харьков, Харьковская обл, Украина');
$I->selectOption('categoryid[]','Транспорт');
$I->waitForElement('#childcat select', 30);
$I->selectOption('Подкатегория','Легковые автомобили');
$I->fillField('description','Харьков, машина');

//Additional fields
$I->waitForElement('#customcont label', 30);
$I->selectOption('vehicle','Ford');
$I->selectOption('body_type','Седан');
$I->fillField('year','2003');
$I->fillField('mileage','2028');
$I->selectOption('transmission','Автомат');
$I->fillField('engine','1200');
$I->selectOption('condition','Хорошее');
$I->selectOption('fuel','Бензин');
$I->fillField('price','10-000');
$I->fillField('fullname','Ольга');
$I->fillField('telephone','12000005');
$I->click('submit');

//Мои объявления
$I->see('Мои объявления');
$I->amOnPage('/my');
$I->click('Ford');
$I->waitForElement('.viewPrice', 30);
$I->see('10 000 $','.viewPrice')
