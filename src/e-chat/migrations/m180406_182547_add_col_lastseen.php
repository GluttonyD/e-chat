<?php

use yii\db\Migration;

/**
 * Class m180406_182547_add_col_lastseen
 */
class m180406_182547_add_col_lastseen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','last_seen',$this->bigInteger());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user','last_seen');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180406_182547_add_col_lastseen cannot be reverted.\n";

        return false;
    }
    */
}
