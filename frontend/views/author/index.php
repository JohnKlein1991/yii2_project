<?php
/* @var $authors frontend\models\Author */

use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

//Yii::$app->session->getFlash('success');
echo Html::tag('h1', 'List of authors');
echo '<table class="table">';
?>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php
foreach ($authors as $author){
    echo '<tr>';
    echo Html::tag('td', $author->id);
    echo Html::tag('td', $author->firstName);
    echo Html::tag('td', $author->lastName);
    echo Html::tag('td', '<a href="'.Url::to(['author/update', 'id' => $author->id]).'">Edit</a>');
    echo Html::tag('td', '<a href="'.Url::to(['author/delete', 'id' => $author->id]).'">Delete</a>');
    echo '</tr>';
}
echo '</table>';