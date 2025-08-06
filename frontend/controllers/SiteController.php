<?php

namespace frontend\controllers;

use common\models\IncomingMessage;
use common\modules\contact\actions\LeaveEmailAction;
use common\modules\contact\models\Contact;
use common\modules\contact\models\TextError;
use common\modules\page\models\Page;
use common\services\TelegramService;
use frontend\models\ContactForm;
use soft\web\SoftController;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Staff;


/**
 * Site controller
 */
class SiteController extends SoftController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'leave-email' => ['post'],
                    'text-error' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'leave-email' => [
                'class' => LeaveEmailAction::class,
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


}
