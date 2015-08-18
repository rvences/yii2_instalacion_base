<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use frontend\models\Contactos;
use frontend\models\Empresas;
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

    <?php
    $gridColumns = [


        // Volviendo Colapsable
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            // http://demos.krajee.com/grid#expand-row-column
            'value' => function ($modelo, $key, $index, $column) {

                return GridView::ROW_COLLAPSED;
            },
            'expandOneOnly' =>true,
            'detail' => function ($modelo, $key, $index, $column) {
                $searchModel = new \frontend\models\search\InversionesSearch();
                $searchModel->empresa_id = $modelo->idempresa;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                return Yii::$app->controller->renderPartial('_inversion-details', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
        ],

        // Se puede obtener el nombre porque existe Empresas::getGerente()
        'gerente',

        // Haciendo el campo de cuenta campo editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'cuenta',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Nombre de la Empresa',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_TEXT, // http://demos.krajee.com/editable


                ];
            }
        ],

        // Haciendo el campo de Estado editable
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status',
            'pageSummary' => true,
            'readonly' => function ($model, $key, $index, $widget) {
                return (!$model->status); // No se permite editar registros inactivos
            },
            'editableOptions' => function ($model, $key, $index, $widget) {
                return [
                    'header' => 'Estado Actual de la Empresa',
                    'size' => 'md',     // http://demos.krajee.com/popover-x#settings
                    'inputType' => \kartik\editable\Editable::INPUT_SELECT2, // http://demos.krajee.com/editable
                    'options' => [
                        'data' => ["Cliente" => "Cliente", "Visitado" => "Visitado", "NO Visitado" => "No Visitado", "Fuera del DF" => "Fuera del DF"],
                    ]


                ];
            }
        ],



/*


            ['class'=>'kartik\grid\SerialColumn'],
            [

                'attribute'=>'empresas_id',
                'width'=>'310px',
                // El modelo utilizado es el de Empresa
                'value'=>function($model, $key, $index, $widget) {

                    echo "<pre>";
                    print_r($model->contactos->nombre);
                    //print_r($model->contactosNombre);
                    echo "</pre>";
                   // return $model->contactos;

                },



                'filterType'=>GridView::FILTER_SELECT2,
                'filter'=>ArrayHelper::map(Contactos::find()->orderBy('nombre')->asArray()->all(), 'empresas_id', 'nombre'),
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Any supplier'],
                'group'=>true,  // enable grouping
            ],




*/
















        ['class' => 'yii\grid\ActionColumn'], // Agrega los campos Ver, Actualizar y Borrar

    ];

    ?>













    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        // 'columns' => $gridColumns,
        // Deshabilitando que se pueda hacer cualquier tipo de exportación evitando exportar .PDF
        'export' => false,
        'pjax' => true,



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

        'columns' => $gridColumns
    ]); ?>

</div>
