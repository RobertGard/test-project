<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m180609_011130_create_store_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'regionId' => $this->integer()->notNull(),
            'city' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'userId' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('store');
    }
}
