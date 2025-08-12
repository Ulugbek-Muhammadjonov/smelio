<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%meta_setting}}`.
 */
class m250811_171503_create_meta_setting_table extends Migration
{

    public $tableName = '{{%meta_setting}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = false;

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'keywords' => $this->text(),
        ];
    }

}
