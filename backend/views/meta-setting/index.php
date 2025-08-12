<?php

use common\models\MetaSetting;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\MetaSettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Meta sozlamalari';
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
<code>Oxirigi qo'shilgan ma'lumot saytda ko'rinadi!</code>
<?= \soft\grid\GridView::widget([
    'id' => 'crud-datatable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'toolbarTemplate' => '{create}{refresh}',
    'toolbarButtons' => [
        'create' => [
            /** @see soft\widget\button\Button for other configurations */
            'modal' => true,
        ]
    ],
    'columns' => [
//                    'id',
        'title',
        'description:ntext',
        'keywords:ntext',
//        'created_by',
        //'updated_by',
        'created_at',
        //'updated_at',
        'actionColumn' => [
            'viewOptions' => [
                'role' => 'modal-remote',
            ],
            'updateOptions' => [
                'role' => 'modal-remote',
            ],
        ],
    ],
]); ?>
