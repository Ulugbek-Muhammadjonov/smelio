<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%banner}}`.
 */
class m250806_154857_create_banner_table extends Migration
{

    public $tableName = '{{%banner}}';

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
            'url' => $this->string(2056),
            'image' => $this->string(),
        ];
    }

}
