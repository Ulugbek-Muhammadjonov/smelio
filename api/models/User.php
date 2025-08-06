<?php
/*
 *  @author Shukurullo Odilov <shukurullo0321@gmail.com>
 *  @link telegram: https://t.me/yii2_dasturchi
 *  @date 21.05.2022, 11:30...
 */

namespace api\models;

use common\modules\user\models\UserDevice;
use common\services\TelegramService;
use Yii;
use yii\web\UploadedFile;

/**
 *
 * @property-read string $imageUrl
 */
class User extends \common\models\User
{

    public $log = true;

    /**
     * {@inheritdoc}
     * @return \common\models\User|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        if (!$token || $token == 'null') {
            return null;
        }

        $device = UserDevice::find()->where(['token' => $token, 'status' => UserDevice::STATUS_ACTIVE])->one();

        $userAgent = \Yii::$app->request->getUserAgent();

        if (!$device) {
//            TelegramService::log("Device not found\n$token\nUserAgent: $userAgent");
            return null;
        }

        $user = static::findOne($device->user_id);

        if (!$user) {
            return null;
        }

        if ($user->status != User::STATUS_ACTIVE) {
            return null;
        }

        return $user;
    }

    public function log($message)
    {
        if ($this->log) {
            TelegramService::log($message);
        }
    }


    /**
     * @return string[]
     */
    public function fields()
    {
        return [
            'id',
            'username',
            'firstname',
            'lastname',
//            'img' => function (User $model) {
//                return $model->getImageUrl();
//            },
            'balance' => function (User $model) {
                return Yii::$app->formatter->asSum($model->getBalance());
            },
            'active_tariff' => function (User $model) {
                return $model->activeUserTariff ? $model->activeUserTariff->tariff->name : 'FREE';
            },
            'active_tariff_id' => function (User $model) {
                return $model->activeUserTariff ? $model->activeUserTariff->tariff->id : null;
            },
            'expired_at' => function (User $model) {
                return $model->activeUserTariff ? date('d.m.Y', $model->activeUserTariff->expired_at) : '';
            },
            'status' => function (User $model) {
                return $this->statusName;
            },
            'notice_status',
            'wifi_download',
            'regionName' => function (User $model) {
                return $model->region ? $model->region->name_uz : '';
            },
            'region_id',
            'gender_id',
            'ganderName' => function (User $model) {
                return $model->getGenderName();
            },
            'born_date' => function (User $model) {
                return $model->getFormatBornDate();
            },
            'allowed_devices_count' => function (User $model) {
                return $model->allowedActiveDevicesCount;
            },
            'is_blocked'
        ];
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->img ? Yii::$app->urlManager->hostInfo . '/uploads/user/' . $this->img : '';
    }

    /**
     * @return string
     */
    public function updateImage()
    {
        $old_img = $this->img;
        $this->img = UploadedFile::getInstanceByName('img');
        $url = Yii::getAlias('@frontend/web/uploads/user/' . $old_img);
        if ($this->img) {
            $this->img->saveAs('@frontend/web/uploads/user/' . 'user' . time() . '.' . $this->img->extension);
            $this->img = 'user' . time() . '.' . $this->img->extension;
            if (is_file($url)) {
                unlink($url);
            }
        } else {
            if (is_file($url)) {
                unlink($url);
            }
        }
    }
}
