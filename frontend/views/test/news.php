<?php
use yii\helpers\Url;

echo '<h1>'.$data['title'].'</h1>';
echo '<p>'.$data['content'].'</p>';
echo '<a href="'.Url::to(['test/index']).'" class="btn btn-info">Retutn to news list</a>';