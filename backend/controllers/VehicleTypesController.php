<?php

namespace backend\controllers;

use Yii;
use common\models\VehicleTypes;
use common\models\VehicleTypesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\components\AdminCoreController;
use common\components\Common;
use yii\helpers\ArrayHelper;
use common\models\VehicleCharges;
use common\models\VehicleTypeRates;
/**
 * VehicleTypesController implements the CRUD actions for VehicleTypes model.
 */
class VehicleTypesController extends AdminCoreController
{
    /**
     * {@inheritdoc}
     */


    /**
     * Lists all VehicleTypes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VehicleTypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehicleTypes model.
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
     * Creates a new VehicleTypes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehicleTypes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::getAlias('@vehicle_type_create'));
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VehicleTypes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
               Yii::$app->session->setFlash('success', Yii::getAlias('@vehicle_type_update'));
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleTypes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
           Yii::$app->session->setFlash('success', Yii::getAlias('@vehicle_type_delete'));
        return $this->redirect(['index']);
    }
     public function actionAddRates($type_id)
    {

        $this->layout = 'popup';
        //GET PROJECT NAME BY PROJECT ID
            $snVehicleTypeName = VehicleTypes::find()->where("id=$type_id")->one();
            $arrVehicleCharges = ArrayHelper::map(VehicleCharges::find()->asArray()->all(), 'id', 'label');
            $vehicle_type_rates = array();
            foreach ($arrVehicleCharges as $key => $charge) {
                $chargeDetails[$key] = $charge;
                $vehicle_charges = VehicleTypeRates::find()->where(['vehicle_type_id' => $type_id, 'vehicle_charge_id' => $key])->one();
                if (!empty($vehicle_charges)) {
                    $vehicle_type_rates[$key] = $vehicle_charges;
                } else {
                    $vehicle_type_rates[$key] = new VehicleTypeRates();
                }
            }
            if (Yii::$app->request->post()) {
                $arrRequestFields = $_REQUEST['VehicleTypeRates'];
                $postData = Yii::$app->request->post();
                $postData = $postData['VehicleTypeRates'];
                foreach ($postData as $key => $value) {
                    $vehicle_type_rates[$key]->load($value);
                    $vehicle_type_rates[$key]['vehicle_charge_id'] = $key;
                    $vehicle_type_rates[$key]['vehicle_type_id'] = $type_id;
                    $vehicle_type_rates[$key]['normal_charge'] = $value['normal_charge'];
                    $vehicle_type_rates[$key]['peak_time_charge'] =$value['peak_time_charge'];
                    $vehicle_type_rates[$key]->save();

                }
                Yii::$app->session->setFlash('success', Yii::getAlias('@vehicle_type_rates_update'));
                return Common::closeColorBox();
            }
            return $this->render('rates', [
                'snVehicleTypeName' => $snVehicleTypeName->title,
                'vehicle_type_rates' => $vehicle_type_rates,
                'chargeDetails' => $chargeDetails,
                'arrVehicleCharges'=>$arrVehicleCharges
            ]);
       
    }

    /**
     * Finds the VehicleTypes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VehicleTypes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VehicleTypes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
