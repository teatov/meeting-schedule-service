<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Appointment;
use yii\rest\ActiveController;

class AppointmentController extends ActiveController
{
    public $modelClass = Appointment::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class ,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }
}