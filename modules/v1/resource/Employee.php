<?php

namespace app\modules\v1\resource;

class Employee extends \app\modules\v1\models\Employee
{
    // public function fields()
    // {
    //     $fields = parent::fields();
    //     $fields[] = 'meetings';
    //     return $fields;
    // }
    public function extraFields()
    {
        return ['meetings'];
    }
}
