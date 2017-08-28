<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * @author Yue Song <songyue118@gmail.com>
 */
class m161028_084412_init extends Migration
{
    public function up()
    {
        $tableOptions = '';

        if (Yii::$app->db->driverName == 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%message}}', [
            'id'                   => Schema::TYPE_PK,
            'hash'                 => Schema::TYPE_STRING . '(32) NOT NULL',
            'from'                 => Schema::TYPE_INTEGER,
            'to'                   => Schema::TYPE_INTEGER,
            'status'               => Schema::TYPE_INTEGER. ' NOT NULL DEFAULT 0',
            'title'                => Schema::TYPE_STRING . '(255) NOT NULL',
            'message'              => Schema::TYPE_TEXT,
            'context'              => Schema::TYPE_STRING . '(255) NOT NULL',
            'created_at'           => Schema::TYPE_DATETIME . ' NOT NULL',
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%message}}');
    }
}
