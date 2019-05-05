<?php


namespace frontend\assets;

use yii\web\AssetBundle;

class GalleryAsset extends AssetBundle
{
    public $css = [
      'css/gallery/style.css'
    ];
    public $js = [
        'js/isotope.js',
        //'js/isotope_init.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}