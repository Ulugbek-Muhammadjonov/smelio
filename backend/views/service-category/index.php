<?php

use common\models\ServiceCategory;
use soft\grid\GridView;
use soft\grid\StatusColumn;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\ServiceCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xizmat kategoriyalari';
$this->params['breadcrumbs'][] = $this->title;
$this->registerAjaxCrudAssets();
?>
<?= GridView::widget([
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
//        'id',
        'name',
        [
            'class' => StatusColumn::class,
        ],
//        'created_by',
//        'updated_by',
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
