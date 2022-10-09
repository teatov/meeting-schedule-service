<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meeting_employee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%meeting}}`
 * - `{{%employee}}`
 */
class m221009_122608_create_junction_table_for_meeting_and_employee_tables extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%appointment}}', [
            'id' => $this->primaryKey(),
            'meeting_id' => $this->integer(),
            'employee_id' => $this->integer(),
            // 'PRIMARY KEY(meeting_id, employee_id)',
        ]);

        // creates index for column `meeting_id`
        $this->createIndex(
            '{{%idx-appointment-meeting_id}}',
            '{{%appointment}}',
            'meeting_id'
        );

        // add foreign key for table `{{%meeting}}`
        $this->addForeignKey(
            '{{%fk-appointment-meeting_id}}',
            '{{%appointment}}',
            'meeting_id',
            '{{%meeting}}',
            'id',
            'CASCADE'
        );

        // creates index for column `employee_id`
        $this->createIndex(
            '{{%idx-appointment-employee_id}}',
            '{{%appointment}}',
            'employee_id'
        );

        // add foreign key for table `{{%employee}}`
        $this->addForeignKey(
            '{{%fk-appointment-employee_id}}',
            '{{%appointment}}',
            'employee_id',
            '{{%employee}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%meeting}}`
        $this->dropForeignKey(
            '{{%fk-appointment-meeting_id}}',
            '{{%appointment}}'
        );

        // drops index for column `meeting_id`
        $this->dropIndex(
            '{{%idx-appointment-meeting_id}}',
            '{{%appointment}}'
        );

        // drops foreign key for table `{{%employee}}`
        $this->dropForeignKey(
            '{{%fk-appointment-employee_id}}',
            '{{%appointment}}'
        );

        // drops index for column `employee_id`
        $this->dropIndex(
            '{{%idx-appointment-employee_id}}',
            '{{%appointment}}'
        );

        $this->dropTable('{{%appointment}}');
    }
}
