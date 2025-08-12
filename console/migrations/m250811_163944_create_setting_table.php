<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%setting}}`.
 */
class m250811_163944_create_setting_table extends Migration
{

    public $tableName = '{{%setting}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = false;
    public $multilingiualAttributes = ['description', 'address'];

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'map' => $this->text(),
            'logo' => $this->string(),
            'description' => $this->text(),
            'address' => $this->string(),
            'email' => $this->string(),
            'phone' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),
            'telegram' => $this->string(),
            'youtube' => $this->string(),
        ];
    }

}
