<?php
class Testtesttest {
    public function action(){
        echo 'Hello world!';
    }
}

$actionFromUrl = 'get_data_about_phonest';
$actionsArray = [
    'get_data_about_phones' => 'getDataAboutPhones',
    'add_to_db' => 'addToDb'
];
$action = $actionsArray[$actionFromUrl];
var_dump($action);
