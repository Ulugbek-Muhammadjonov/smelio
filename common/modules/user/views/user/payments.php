<?php

use common\models\User;
use common\modules\userbalance\models\UserPayment;
use common\modules\userbalance\UserPaymentActionColumn;
use soft\grid\GridView;

/* @var $this soft\web\View */
/* @var $searchModel common\modules\userbalance\models\search\UserPaymentSearch */
/* @var $model User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Foyd.chi to'lovlari. " . $model->fullname;
$this->addBreadCrumb("Foydalanuvchilar", 'index');
$this->addBreadCrumb($model->fullname, ['user/view', 'id' => $model->id]);
$this->addBreadCrumb("To'lovlari");


$this->registerAjaxCrudAssets();

?>
<?= $this->render('_tab-menu', ['model' => $model]) ?>
<?= GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{create}{refresh}',
    'toolbarButtons' => [
        'create' => $model->getIsDeleted() ? false : [
            'modal' => true,
            'title' => "Hisobni to'ldirish",
            'url' => ['fill-balance', 'id' => $model->id],
        ]
    ],
    'columns' => [
        'created_at',
        'amount:sum',
        [
            'attribute' => 'type_id',
            'value' => 'typeName',
            'filter' => UserPayment::types(),
        ],
        'comment',
        [
            'class' => UserPaymentActionColumn::class
        ]
    ],
]); ?>
