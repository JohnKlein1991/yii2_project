<?php
if($model->hasErrors()){
    echo '<pre>';
    print_r($model->errors);
    echo '</pre>';
}
if(Yii::$app->session->hasFlash('success')){
    Yii::$app->session->getFlash('success');
}
?>
<h1>Update your information</h1>

<form method="post">

    <p>First name</p>
    <input type="text" name="firstName">
    <p>Last name</p>
    <input type="text" name="lastName">
    <p>Middle name</p>
    <input type="text" name="middleName">
    <br><br>
    <input type="submit">
</form>