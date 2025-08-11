<?php

use soft\db\Migration;

/**
 * Handles the creation of table `{{%our_team}}`.
 */
class m250810_101033_create_our_team_table extends Migration
{

    /**
     * @var string
     */
    public $tableName = '{{%our_team}}';

    /**
     * @var bool
     */
    public $blameable = true;

    /**
     * @var bool
     */
    public $timestamp = true;

    /**
     * @var bool
     */
    public $status = true;
    /**
     * @var string[]
     */
    public $multilingiualAttributes = ['content', 'position'];

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(),
            'content' => $this->text(),
            'position' => $this->string(),
            'image' => $this->string(),
        ];
    }

}
