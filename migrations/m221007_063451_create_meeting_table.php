<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meeting}}`.
 */
class m221007_063451_create_meeting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meeting}}', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'start_time' => $this->time()->notNull(),
            'end_time' => $this->time()->notNull(),
            'topic' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%meeting}}');
    }
}
