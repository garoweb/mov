<?php

use yii\db\Migration;

class m160328_104203_gallery extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%gallery}}', [
            'id' => $this->primaryKey(),
            'item_parent_id' => $this->string()->notNull(),
            'item_name' => $this->string()->notNull(),
            'item_img' => $this->string()->notNull(),
            'item_status' => $this->string()->notNull(),
            'item_order' => $this->string()->notNull(),
           
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%gallery}}');
    }
}
