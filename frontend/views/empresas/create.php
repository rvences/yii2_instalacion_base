<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Empresas */

$this->title = 'Create Empresas';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
