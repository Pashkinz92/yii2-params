<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `config`.
 */
class m160715_125351_create_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('config', [
            'id' => $this->primaryKey(),
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'value' => Schema::TYPE_STRING . '(10000) NOT NULL',
            'param_desc' => Schema::TYPE_STRING . '(10000) NOT NULL',
            'valid' => Schema::TYPE_STRING . '(10000) NOT NULL',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('config');
    }
}
