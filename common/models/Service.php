<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use soft\db\ActiveRecord;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $name
 * @property string|null $content
 * @property string|null $duration
 * @property int|null $price
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $category_id
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property ServiceCategory $category
 */
class Service extends ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'name', 'category_id'], 'required'],
            [['price', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'category_id'], 'integer'],
            [['name', 'duration'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['image'], 'image'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return parent::find()->multilingual();
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'yii\behaviors\TimestampBehavior',
            'yii\behaviors\BlameableBehavior',
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'attributes' => ['name', 'content', 'duration'],
            ],
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'deleteOriginalFile' => true,
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/images/service/{id}',
                'url' => '/uploads/images/service/{id}',
                'thumbs' => [
                    'preview' => ['width' => 500, 'quality' => 90],
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
            'image' => 'Rasm',
            'price' => 'Narxi',
            'status' => 'Holati',
            'name' => 'Nomi',
            'content' => 'Kontent',
            'duration' => 'Davomiyligi',
            'category_id' => 'Kategoriyasi',
        ];
    }
    //</editor-fold>

    //<editor-fold desc="Relations" defaultstate="collapsed">

    /**
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ServiceCategory::className(), ['id' => 'category_id']);
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
