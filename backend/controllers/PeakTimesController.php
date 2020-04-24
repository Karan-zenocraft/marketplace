<?php
  
namespace backend\controllers;

use Yii;
use common\models\PeakTimes;
use common\models\PeakTimesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\AdminCoreController;

  
/**
 * PeakTimesController implements the CRUD actions for PeakTimes model.
 */
class PeakTimesController extends AdminCoreController
{
    /**
     * {@inheritdoc}
     */
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all PeakTimes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeakTimesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PeakTimes model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PeakTimes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PeakTimes();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $postData = Yii::$app->request->post();
             $model->start_time = date("H:i:s", strtotime($postData['PeakTimes']['start_time']));
            $model->end_time = date("H:i:s", strtotime($postData['PeakTimes']['end_time']));
            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::getAlias('@peak_times_create'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PeakTimes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $postData = Yii::$app->request->post();
             $model->start_time = date("H:i:s", strtotime($postData['PeakTimes']['start_time']));
            $model->end_time = date("H:i:s", strtotime($postData['PeakTimes']['end_time']));
            $model->save(false);
            Yii::$app->session->setFlash('success', Yii::getAlias('@peak_times_update'));
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PeakTimes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', Yii::getAlias('@peak_times_delete'));
        return $this->redirect(['index']);
    }

    /**
     * Finds the PeakTimes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PeakTimes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PeakTimes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
