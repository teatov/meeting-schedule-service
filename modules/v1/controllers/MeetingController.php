<?php

namespace app\modules\v1\controllers;

use app\modules\v1\resource\Employee;
use app\modules\v1\resource\Meeting;
use Yii;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class MeetingController extends FilterableController
{
    public $modelClass = Meeting::class;

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate()
    {
        $model = new $this->modelClass;
        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        $model->save();

        if (!isset(Yii::$app->getRequest()->getBodyParams()['employees']))
            return $model;

        foreach (Yii::$app->getRequest()->getBodyParams()['employees'] as $employee) {
            $employee_model = null;
            if (array_key_exists('id', $employee)) {
                $employee_model = Employee::findOne($employee['id']);
            }
            elseif (array_key_exists('name', $employee)) {
                $employee_model = Employee::findOne(['name' => $employee['name']]);
            }
            else {
                throw new BadRequestHttpException('Please provide valid employee ID or name');
            }

            if ($employee_model) {
                $model->link('employees', $employee_model);
            }
            else {
                throw new NotFoundHttpException('Employee with ' . (array_key_exists('id', $employee) ? ('id ' . $employee['id']) : ('name ' . $employee['name'])) . ' does not exist');
            }
        }

        return [...$model, 'employees' => $model->employees];
    }
}