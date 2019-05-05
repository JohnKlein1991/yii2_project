<?php

namespace frontend\models\examples;


class Dog
{
    use SpecialTrait;

    public function gav(){
        echo 'Gav-Gav';
    }
}