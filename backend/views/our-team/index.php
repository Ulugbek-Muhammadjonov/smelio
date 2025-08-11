<?php

use common\models\OurTeam;
use soft\grid\GridView;
use soft\grid\StatusColumn;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\OurTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bizing jamoa';
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
        [
            'attribute' => 'imageUrl',
            'label' => Yii::t('app', 'Image'),
            'format' => ['image', ['width' => '40px']]
        ],
        'position',
        'full_name',
        [
            'class' => StatusColumn::class,
        ],
//        'created_by',
        //'updated_by',
        'created_at',
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
