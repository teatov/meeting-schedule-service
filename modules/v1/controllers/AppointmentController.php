<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Appointment;

class AppointmentController extends FilterableController
{
    public $modelClass = Appointment::class;
}