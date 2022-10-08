<?php

namespace app\modules\v1\models;

use Yii;

/**
 * This is the model class for table "{{%employee}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $title
 *
 * @property Appointment[] $appointments
 * @property Meeting[] $meetings
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%employee}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'title'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Appointments]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\AppointmentQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Meetings]].
     *
     * @return \yii\db\ActiveQuery|\app\modules\v1\models\query\MeetingQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::class, ['id' => 'meeting_id'])->viaTable('{{%appointment}}', ['employee_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\v1\models\query\EmployeeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\v1\models\query\EmployeeQuery(get_called_class());
    }
}
