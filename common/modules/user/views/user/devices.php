<?php

/*
 *  @author Shukurullo Odilov <shukurullo0321@gmail.com>
 *  @link telegram: https://t.me/yii2_dasturchi
 *  @date 18.05.2022, 10:25
 */

/* @var $this \soft\web\View */
/* @var $searchModel \common\modules\user\models\search\UserDeviceSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $model \common\modules\user\models\User */

$this->title = "Foyd.chi qurilmalari " . $model->fullname;
$this->addBreadCrumb("Foydalanuvchilar", 'index');
$this->addBreadCrumb($model->fullname, ['user/view', 'id' => $model->id]);
$this->addBreadCrumb("Qurilmalar");

?>

<?= $this->render('_tab-menu', ['model' => $model]) ?>

<?= \soft\grid\GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{refresh}',
    'toolbarButtons' => [
        'create' => false
    ],
    'columns' => [
        'device_id',
        'device_name',
        [
            'class' => \soft\grid\StatusColumn::class,
            'filter' => \common\modules\user\models\UserDevice::statuses(),
        ],
//        'token',
        [
            'attribute' => 'created_at',
            'format' => 'datetimeuz',
            'filter' => false,
        ],
        [
            'class' => \common\modules\user\columns\UserDeviceActionColumn::class,
        ]
    ],
]); ?>
