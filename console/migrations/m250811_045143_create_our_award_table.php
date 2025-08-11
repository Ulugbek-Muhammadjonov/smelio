<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%our_award}}`.
 */
class m250811_045143_create_our_award_table extends Migration
{

    public $tableName = '{{%our_award}}';

    public $blameable = true;

    public $timestamp = true;

    public $status = true;

    public $multilingiualAttributes = ['title', 'description'];

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'image' => $this->string(),
        ];
    }

}
