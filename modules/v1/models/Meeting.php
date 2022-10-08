<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%meeting}}".
 *
 * @property int $id
 * @property string $date
 * @property string $start_time
 * @property string $end_time
 * @property string|null $topic
 *
 * @property Appointment[] $appointments
 * @property Employee[] $employees
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%meeting}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'start_time', 'end_time'], 'required'],
            [['date', 'start_time', 'end_time'], 'safe'],
            [['topic'], 'string'],
            ['end_time', 'validateTime'],
        ];
    }
    public function validateTime()
    {
        if (strtotime($this->start_time) >= strtotime($this->end_time)) {
            $this->addError('start_date', 'A meeting cannot start after it\'s end');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'topic' => 'Topic',
        ];
    }

    /**
     * Gets query for [[Appointments]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\AppointmentQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::class , ['meeting_id' => 'id']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\EmployeeQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::class , ['id' => 'employee_id'])->viaTable('{{%appointment}}', ['meeting_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\query\MeetingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\models\query\MeetingQuery(get_called_class());
    }
}