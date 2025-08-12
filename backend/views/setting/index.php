<?php

use common\models\Setting;

/* @var $this soft\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sozlamalar';
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
                        'modal' => false,
                ]
        ],
        'columns' => [
//                'id',
//                'map:ntext',
                [
                        'attribute' => 'imageUrl',
                        'label' => Yii::t('app', 'Image'),
                        'format' => ['image', ['width' => '40px']]
                ],
                'email:email',
                'phone',
            //'facebook',
            //'instagram',
            //'telegram',
            //'youtube',
            //'created_by',
            //'updated_by',
                'created_at',
            //'updated_at',
                'actionColumn' => [
//                        'viewOptions' => [
//                                'role' => 'modal-remote',
//                        ],
//                        'updateOptions' => [
//                                'role' => 'modal-remote',
//                        ],
                ],
        ],
]); ?>
