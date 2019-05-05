<?php
foreach ($newsList as $item){
    echo '<h1>'.$item['title'].'</h1>';
    echo '<p>'.$item['content'].'</p>';
    echo '<hr>';
}