<?php

namespace app\modules\v1\controllers;

use app\modules\v1\resource\Meeting;

class MeetingController extends FilterableController
{
    public $modelClass = Meeting::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['create'] = [
            'class' => 'app\modules\v1\controllers\actions\CreateMeetingAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'scenario' => $this->createScenario,
        ];

        return $actions;
    }
}