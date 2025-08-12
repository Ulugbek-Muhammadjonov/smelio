<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;
use odilov\multilingual\behaviors\MultilingualBehavior;
use soft\db\ActiveRecord;
use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string|null $map
 * @property string|null $logo
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $telegram
 * @property string|null $youtube
 * @property string|null $address
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Setting extends ActiveRecord
{
    //<editor-fold desc="Parent" defaultstate="collapsed">

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['map', 'description'], 'string'],
            [['created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['logo'], 'image'],
            [['email', 'phone', 'facebook', 'instagram', 'telegram', 'youtube', 'address'], 'string', 'max' => 255],
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
                'attribute' => 'logo',
                'deleteOriginalFile' => true,
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/images/setting/{id}',
                'url' => '/uploads/images/setting/{id}',
                'thumbs' => [
                    'preview' => ['width' => 1200, 'quality' => 90],
                ],
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::class,
                'attributes' => ['address', 'description'],
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
            'map' => 'Map',
            'logo' => 'Logo',
            'email' => 'Email',
            'phone' => 'Phone',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'telegram' => 'Telegram',
            'youtube' => 'Youtube',
            'address' => 'Manzil',
            'description' => 'Klinika haqida qisqa tavsif',
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
        return $this->getBehavior('image')->getThumbUploadUrl('logo', 'preview');
    }
}
