<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%service_category}}`.
 */
class m250810_092239_create_service_category_table extends Migration
{

    public $tableName = '{{%service_category}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = true;
    public $multilingiualAttributes = ['name'];

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ];
    }

}
