<?php
/*
 * @var $this yii\web\View
 *
 *
 */
$this->title = 'Find timezone by number';
$this->registerMetaTag([
        'name' => 'description',
        'content' => 'Use our service and find out timezone by phone number'
]);

echo '<pre>';
var_dump($data);
echo '</pre>';
?>
<form method="post">
    <p>Please, insert phone number:</p>
    <input type="text" name="phone">
    <br><br>
    <input type="submit">
</form>