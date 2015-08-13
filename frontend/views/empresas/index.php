<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'columns' => $gridColumns,
        // Deshabilitando que se pueda hacer cualquier tipo de exportación evitando exportar .PDF
        'export' => false,
        /* Agregar despues
        'pjax' => true,

         * */


        'bordered'=>true,
        'striped'=>true,
        'condensed'=>true,
        'responsive'=>true,
        'hover'=>true,
        'panel'=>[
            'type'=>GridView::TYPE_PRIMARY,
            'heading'=>true,
        ],
        'persistResize'=>false,
        'exportConfig'=>true,

        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                // http://demos.krajee.com/grid#expand-row-column
                'value' => function ($model, $key, $index, $column) {

                    return GridView::ROW_COLLAPSED;
                },
                'expandOneOnly' =>true,
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new \frontend\models\search\InversionesSearch();
                    $searchModel->empresa_id = $model->idempresa;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_inversion-details', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            //['class' => 'yii\grid\SerialColumn'],
            //'idempresa',
            //'user_id',
            'cuenta',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
