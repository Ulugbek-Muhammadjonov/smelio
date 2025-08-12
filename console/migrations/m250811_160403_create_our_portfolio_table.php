<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%our_portfolio}}`.
 */
class m250811_160403_create_our_portfolio_table extends Migration
{

    public $tableName = '{{%our_portfolio}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = true;

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'sort_order' => $this->integer()->defaultValue(999),
        ];
    }

}
