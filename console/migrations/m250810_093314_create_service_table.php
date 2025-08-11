<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m250810_093314_create_service_table extends Migration
{

    public $tableName = '{{%service}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = true;
    public $multilingiualAttributes = ['name', 'duration', 'content'];

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'price' => $this->integer(),
            'duration' => $this->string(),
            'content' => $this->text(),
            'category_id' => $this->integer(),

        ];
    }

}
