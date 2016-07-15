<?php

use yii\db\Migration;

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
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';


        $this->createTable('{{%config}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'value' => $this->string(10000)->notNull(),
            'param_desc' => $this->string(10000)->notNull(),
            'valid' => $this->string(1000)->notNull(),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('config');
    }
}
