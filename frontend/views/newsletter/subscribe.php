<?php
/* @var $model \frontend\models\Subscribe*/
if(Yii::$app->session->hasFlash('statusForSubscriber')){
    echo '<p>'.Yii::$app->session->getFlash('statusForSubscriber').'</p>';
}
?>
<form method="post">
    <p>Email</p>
    <input type="text" name="email">
    <br><br>
    <input type="submit">
</form>
<?php
    $errors = $model->getErrors();
    if($model->hasErrors()){
        ?>
        <p>Ошибка!</p>
        <p><?=$errors['email'][0]?></p>
        <?php
    }
?>