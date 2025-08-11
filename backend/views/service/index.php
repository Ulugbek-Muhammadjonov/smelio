<?php

use common\models\Service;
use common\models\ServiceCategory;
use soft\grid\GridView;
use soft\grid\StatusColumn;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xizmatlar';
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
            'modal' => false,
        ]
    ],
    'columns' => [
//        'id',
        [
            'attribute' => 'imageUrl',
            'label' => Yii::t('app', 'Image'),
            'format' => ['image', ['width' => '40px']]
        ],
        'name',
        'price:sum',
        [
            'attribute' => 'category_id',
            'format' => 'raw',
            'value' => function (Service $model) {
                return $model->category ? $model->category->name : '';
            },
            'filter' => ServiceCategory::map(),
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => false
                ],
            ],
        ],
        [
            'class' => StatusColumn::class,
        ],
//        'created_by',
        //'updated_by',
        //'created_at',
        //'updated_at',
        'actionColumn' => [
//            'viewOptions' => [
//                'role' => 'modal-remote',
//            ],
//            'updateOptions' => [
//                'role' => 'modal-remote',
//            ],
        ],
    ],
]); ?>
