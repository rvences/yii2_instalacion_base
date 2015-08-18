<?php
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\InversionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="inversiones-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'anio',
            'monto_inversion',
            'monto_propuesta',
            'fecha_campana',
            'productos_interes',
            'comentarios',
            'propuesta',
            'campana',
            'temporalidad',
        ],
    ]); ?>

</div>
