<?php

namespace app\modules\v1\resource;

use Yii;
use yii\rest\CreateAction;
use yii\web\BadRequestHttpException;

class CreateActionMeeting extends CreateAction
{
    public function run()
    {
        $model = parent::run();

        foreach (Yii::$app->getRequest()->getBodyParams()['employees'] as $employee) {
            $employee_model = null;
            if (array_key_exists('id', $employee)) {
                $employee_model = Employee::findOne($employee['id']);
            }
            elseif (array_key_exists('name', $employee)) {
                $employee_model = Employee::findOne(['name'=> $employee['name']]);
            }

            if ($employee_model){
                $model->link('employees', $employee_model);
            } else {
                throw new BadRequestHttpException('Please provide valid employee ID or name');
            }
        }

        return [...$model, 'employees' => $model->employees];
    }
}