<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\uploader\models\RecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idrecipes',
            'name',
            'picture',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
