<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string|null $url
 * @property string|null $image
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Banner extends \soft\db\ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['url'], 'string', 'max' => 2056],
            [['image'], 'image'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'yii\behaviors\TimestampBehavior',
            'yii\behaviors\BlameableBehavior',
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'deleteOriginalFile' => true,
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/images/banner/{id}',
                'url' => '/uploads/images/banner/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1200, 'quality' => 90],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function labels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'image' => 'Rasm',
        ];
    }
    //</editor-fold>

    //<editor-fold desc="Relations" defaultstate="collapsed">

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    //</editor-fold>

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', 'preview');
    }
}
