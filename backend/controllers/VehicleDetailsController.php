<?php

namespace backend\controllers;

use Yii;
use common\models\VehicleDetails;
use common\models\VehicleDetailsSearch;
use backend\components\AdminCoreController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\Common;
use common\models\Users;
use common\models\EmailFormat;
use common\models\NotificationList;
use common\models\DeviceDetails;



/**
 * VehicleDetailsController implements the CRUD actions for VehicleDetails model.
 */
class VehicleDetailsController extends AdminCoreController
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
     * Lists all VehicleDetails models.
     * @return mixed
     */
    public function actionIndex($user_id)
    {
        $searchModel = new VehicleDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VehicleDetails model.
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
     * Creates a new VehicleDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VehicleDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VehicleDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VehicleDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionApproveVehicle($vehicle_id)
    {
        $this->layout = 'popup';
        $vehicleModel = VehicleDetails::find()->where(['id' => $vehicle_id])->one();
        if (!empty(Yii::$app->request->post()) && !empty($vehicleModel)) {

            $postData = Yii::$app->request->post();
            $vehicleModel->is_approve = $postData['VehicleDetails']['is_approve'];
            $vehicleModel->admin_message = $postData['VehicleDetails']['admin_message'];
           if($vehicleModel->save(false)){
             $user_id = $vehicleModel->user_id;
            $deviceModel = DeviceDetails::find()->select('device_tocken,type')->where(['user_id' => $user_id])->one();
                $device_tocken = !empty($deviceModel) ? $deviceModel->device_tocken : "";
                $type = !empty($deviceModel) ? $deviceModel->type : "";
                if (!empty($type) && $type == Yii::$app->params['device_type']['android']) {
                    $title = "Vehicle Status Notification";
                    $body = "Your Vehicle is " . Yii::$app->params['is_approve_vehicle'][$vehicleModel->is_approve]." by admin.";
                    $status = Common::push_notification_android($device_tocken, $title, $body);
                    if ($status) {
                        $NotificationListModel = new NotificationList();
                        $NotificationListModel->user_id = $user_id;
                        $NotificationListModel->title = $title;
                        $NotificationListModel->body = $body;
                        $NotificationListModel->status = 1;
                        $NotificationListModel->save(false);
                    }
                }
                $emailformatemodel = EmailFormat::findOne(["title" => 'vehicle_status', "status" => '1']);
                    if ($emailformatemodel) {
                        $user = Users::findOne($user_id);
                        //create template file
                        $AreplaceString = array('{driver_name}' => $user->first_name." ".$user->last_name,'{vehicle_name}'=>$vehicleModel->name,'{is_approve}'=>Yii::$app->params['is_approve_vehicle'][$vehicleModel->is_approve],'{admin_message}'=>$vehicleModel->admin_message);

                        $body = Common::MailTemplate($AreplaceString, $emailformatemodel->body);
                        $ssSubject = $emailformatemodel->subject;
                        //send email for new generated password
                        $ssResponse = Common::sendMail($user->email, Yii::$app->params['adminEmail'], $ssSubject, $body);


           }
            Yii::$app->session->setFlash('success', Yii::getAlias('@vehicle_update_message'));
            return Common::closeColorBox();

        }
    }
        return $this->render('approve_vehicle', [
            'vehicleModel' => $vehicleModel,
        ]);
}


    /**
     * Finds the VehicleDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VehicleDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VehicleDetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
