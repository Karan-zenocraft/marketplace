<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VehicleDetails;

/**
 * VehicleDetailsSearch represents the model behind the search form of `common\models\VehicleDetails`.
 */
class VehicleDetailsSearch extends VehicleDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'vehicle_type_id', 'seat_capacity', 'status'], 'integer'],
            [['name', 'vehicle_registration_no', 'vehicle_image_front', 'vehicle_image_back', 'driver_license_image_front', 'driver_license_image_back', 'vehicle_registration_image_front', 'vehicle_registration_image_back', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = VehicleDetails::find()->where(['user_id'=>$params['user_id']]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'vehicle_type_id' => $this->vehicle_type_id,
            'seat_capacity' => $this->seat_capacity,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'vehicle_registration_no', $this->vehicle_registration_no])
            ->andFilterWhere(['like', 'vehicle_image_front', $this->vehicle_image_front])
            ->andFilterWhere(['like', 'vehicle_image_back', $this->vehicle_image_back])
            ->andFilterWhere(['like', 'driver_license_image_front', $this->driver_license_image_front])
            ->andFilterWhere(['like', 'driver_license_image_back', $this->driver_license_image_back])
            ->andFilterWhere(['like', 'vehicle_registration_image_front', $this->vehicle_registration_image_front])
            ->andFilterWhere(['like', 'vehicle_registration_image_back', $this->vehicle_registration_image_back]);

        return $dataProvider;
    }
}
