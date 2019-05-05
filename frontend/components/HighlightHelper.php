<?php


namespace frontend\components;


class HighlightHelper
{
    public static function highlight($text, $needle)
    {
        return str_replace($needle, '<b>'.$needle.'</b>', $text);
    }
}