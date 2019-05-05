<?php

namespace frontend\models\examples;

class Cat{
    use SpecialTrait;

    public function mur(){
        echo 'Mur-Mur';
    }
}