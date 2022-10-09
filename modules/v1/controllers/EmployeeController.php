<?php

namespace app\modules\v1\controllers;

use app\modules\v1\resource\Employee;
use Yii;

class EmployeeController extends FilterableController
{
    public $modelClass = Employee::class;

    public function actionBuildSchedule($id, $date)
    {
        $model = $this->modelClass::findOne($id);

        // берём заседания только на заданный день
        $meetings = array_filter($model->meetings, function ($meeting) use ($date) {
            return $meeting->date === $date;
        });

        // каждому заседанию добавляем время начала
        // и конца в unix формате. так удобнее сравнивать
        $meetings = array_map(function ($meeting) {
            return [...$meeting,
            'start_timestamp' => strtotime($meeting->start_time),
            'end_timestamp' => strtotime($meeting->end_time)];
        }, $meetings);

        // сортируем заседания по времени конца,
        // а если они одинаковы, то по времени начала
        usort($meetings, function ($a, $b) {
            if ($a['end_timestamp'] === $b['end_timestamp'])
                return $a['start_timestamp'] - $b['start_timestamp'];
            else
                return $a['end_timestamp'] - $b['end_timestamp'];
        });

        // здесь будет результат
        $schedule = [];

        // пробегаемся по заседаниям. добавляем в результат заседание,
        // если оно не пересекается с тем, что уже лежит в результате
        foreach ($meetings as $key => $meeting) {
            if ($key === 0 || $meeting['start_timestamp'] >= end($schedule)['end_timestamp']) {
                array_push($schedule, $meeting);
            }
        }

        // подчищаем результат от unix времени
        $schedule = array_map(function ($meeting) {
            unset($meeting['start_timestamp']);
            unset($meeting['end_timestamp']);
            return $meeting;
        }, $schedule);

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [...$schedule];
    }
}