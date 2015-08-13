<?php
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\InversionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inversiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inversiones-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'anio',
            'monto_inversion',
            'monto_propuesta',
        ],
    ]); ?>

</div>
