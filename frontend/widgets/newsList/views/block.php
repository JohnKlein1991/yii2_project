<?php

use yii\helpers\Url;

foreach ($data as $key => $item) {
    echo '<h1>'.$item['title'].'</h1>';
    echo '<p>'.$item['content'].'<a href="'.Url::to(['test/view', 'id' => $item['id']]).'">...</a></p>';
}