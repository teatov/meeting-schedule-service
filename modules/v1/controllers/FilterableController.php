<?php

namespace app\modules\v1\controllers;

use yii\rest\ActiveController;

class FilterableController extends ActiveController
{
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