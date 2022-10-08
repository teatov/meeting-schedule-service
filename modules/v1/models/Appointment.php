<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%appointment}}".
 *
 * @property int $meeting_id
 * @property int $employee_id
 *
 * @property Employee $employee
 * @property Meeting $meeting
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%appointment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meeting_id', 'employee_id'], 'required'],
            [['meeting_id', 'employee_id'], 'integer'],
            [['meeting_id', 'employee_id'], 'unique', 'targetAttribute' => ['meeting_id', 'employee_id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
            [['meeting_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meeting::class, 'targetAttribute' => ['meeting_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'meeting_id' => 'Meeting ID',
            'employee_id' => 'Employee ID',
        ];
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\EmployeeQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    /**
     * Gets query for [[Meeting]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\MeetingQuery
     */
    public function getMeeting()
    {
        return $this->hasOne(Meeting::class, ['id' => 'meeting_id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\query\AppointmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\models\query\AppointmentQuery(get_called_class());
    }
}
