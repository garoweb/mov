<?php

use yii\db\Migration;

class m160325_090136_categs extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%categs}}', [
            'id' => $this->primaryKey(),
            'categ_name' => $this->string()->notNull(),
            'categ_img' => $this->string()->notNull(),
            'categ_status' => $this->string()->notNull(),
            'categ_order' => $this->string()->notNull(),
           
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%categs}}');
    }
}
