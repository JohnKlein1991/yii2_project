<?php

namespace models;

abstract class AbstractModel
{
    abstract public function connect();

    abstract public function saveToDB();

    abstract public function loadFromDB();
}