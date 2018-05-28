<?php

use yii\db\Migration;

/**
 * Class m180406_133910_add_col_isOnline
 */
class m180406_133910_add_col_isOnline extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','isOnline',$this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','isOnline');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_133910_add_col_isOnline cannot be reverted.\n";

        return false;
    }
    */
}
