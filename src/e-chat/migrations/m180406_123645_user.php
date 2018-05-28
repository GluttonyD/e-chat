<?php

use yii\db\Migration;

/**
 * Class m180406_123645_user
 */
class m180406_123645_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id'=>$this->bigPrimaryKey(),
            'nickname'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_123645_user cannot be reverted.\n";

        return false;
    }
    */
}
