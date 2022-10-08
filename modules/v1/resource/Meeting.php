<?php

namespace app\modules\v1\resource;


class Meeting extends \app\modules\v1\models\Meeting
{
    // public function fields()
    // {
    //     $fields = parent::fields();
    //     $fields[] = 'employees';
    //     return $fields;
    // }
    public function extraFields()
    {
        return ['employees'];
    }
}