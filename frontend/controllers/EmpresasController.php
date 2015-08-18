<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Empresas;
use frontend\models\search\EmpresasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * EmpresasController implements the CRUD actions for Empresas model.
 */
class EmpresasController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Empresas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // En caso de que exista un valor que sea editable vía AJAX
        if (Yii::$app->request->post('hasEditable')) {
            // Creando una nueva instancia de la clase empresa para guardar
            $empresaId = Yii::$app->request->post('editableKey');
            $modelo = Empresas::findOne($empresaId);

            // Almacenando la respuesta JSON por defecto para el dato editable
            $out = Json::encode(['output'=>'', 'message'=>'']);

            // Obtiene el primer dato envíado vía POST (Solo debe de ser un dato)
            // $posted Es el dato enviado por Empresas sin indices
            // $post Es el dato convertido en un arreglo para realizar validaciones
            $post = [];
            $posted = current($_POST['Empresas']);
            $post['Empresas'] = $posted;

            // Ejecutando el modelo como cualquier validacion simple
            if ($modelo->load($post)) {
                // Guardando el modelo o se puede realizar algo antes de guardar
                $modelo->save();
                // Texto a ser retornado para ser mostrado en la celda editable
                $output = '';
                // Validando diferentes datos del modelo que sean enviados vía AJAX
                if (isset($posted['cuenta'])) {
                    $output = Yii::$app->formatter->asText($modelo->cuenta);
                }
                if (isset($posted['status'])) {
                    $output = Yii::$app->formatter->asText($modelo->status);
                }


                $out = Json::encode(['output'=>$output, 'message'=>'']);
                echo $out;
                return;

            }




        }

        // En caso de que no sea actualizado via AJAX
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Empresas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idempresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idempresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Empresas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Empresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
