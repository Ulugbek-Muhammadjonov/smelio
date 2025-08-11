<?php

use yii\db\Migration;

/**
 * Class m250811_044726_add_sort_order_column_our_team_table
 */
class m250811_044726_add_sort_order_column_our_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%our_team}}', 'sort_order', $this->integer()->defaultValue(999));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%our_team}}', 'sort_order');
    }
}
