<?php

namespace app\modules\v1\controllers;

use app\modules\v1\resource\Meeting;
use yii\rest\ActiveController;

class MeetingController extends ActiveController
{
    public $modelClass = Meeting::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['create'] = [
            'class' => 'app\modules\v1\resource\CreateActionMeeting',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->createScenario,
        ];

        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class ,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }
}