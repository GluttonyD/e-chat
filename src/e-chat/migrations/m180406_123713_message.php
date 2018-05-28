<?php

use yii\db\Migration;

/**
 * Class m180406_123713_message
 */
class m180406_123713_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('message',[
            'id'=>$this->bigPrimaryKey(),
            'text'=>$this->string(),
            'author_nickname'=>$this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_123713_message cannot be reverted.\n";

        return false;
    }
    */
}
