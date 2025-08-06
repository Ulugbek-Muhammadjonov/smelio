<?php

use common\models\User;
use common\modules\userbalance\models\UserTariff;
use soft\grid\GridView;

/* @var $this soft\web\View */
/* @var $searchModel common\modules\userbalance\models\search\UserTariffSearch */
/* @var $model User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->getFullname() . ' - Sotib olgan tariflari';
$this->addBreadCrumb("Foydalanuvchilar", 'index');
$this->addBreadCrumb($model->fullname, ['user/view', 'id' => $model->id]);
$this->addBreadCrumb('Sotib olgan tariflari');
?>
<?= $this->render('_tab-menu', ['model' => $model]) ?>
<?= GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{refresh}',
    'panel' => [
        'before' => "<i>Foydalanuvchi <b>{$model->fullname}</b> tomonidan sotib olingan tariflar</i>",
    ],
    'toolbarButtons' => [
        'create' => false,
    ],
    'columns' => [
        'tariff.name',
        'price:sum',
        'started_at:date',
        'expired_at:date',
        'created_at',
        //'updated_at',
        'actionColumn' => [
            'controller' => '/user-balance-manager/user-tariff',
            'viewOptions' => [
                'role' => 'modal-remote',
            ],
            'updateOptions' => [
                'role' => 'modal-remote',
            ],
        ],
    ],
]); ?>
