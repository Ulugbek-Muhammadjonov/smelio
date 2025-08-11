<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use soft\db\ActiveRecord;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "our_team".
 *
 * @property int $id
 * @property string|null $full_name
 * @property string|null $image
 * @property string|null $position
 * @property string|null $content
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $sort_order
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class OurTeam extends ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'our_team';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'position'], 'required'],
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'sort_order'], 'integer'],
            [['full_name', 'position'], 'string', 'max' => 255],
            [['content'], 'safe'],
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
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'attributes' => ['position', 'content'],
            ],
            'image' => [
                'class' => UploadImageBehavior::class,
                'attribute' => 'image',
                'deleteOriginalFile' => true,
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/images/ourTeam/{id}',
                'url' => '/uploads/images/ourTeam/{id}',
                'thumbs' => [
                    'preview' => ['width' => 960, 'quality' => 90],
                ],
            ],
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
    public function labels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'F.I.O',
            'image' => 'Rasm',
            'status' => 'Holati',
            'content' => 'Kontent',
            'position' => 'Lavozimi',
            'sort_order' => 'Tartib raqami',
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

    //</editor-fold>

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->getBehavior('image')->getThumbUploadUrl('image', 'preview');
    }
}
