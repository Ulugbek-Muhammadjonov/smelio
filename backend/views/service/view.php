<?php


/* @var $this soft\web\View */

/* @var $model common\models\Service */

use common\models\Service;
use soft\widget\bs4\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Xizmatlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
//        'id',
        [
            'attribute' => 'imageUrl',
            'label' => Yii::t('app', 'Image'),
            'format' => ['image', ['width' => '40px']]
        ],
        'name_uz',
        'name_ru',
        'name_en',
        'content_uz:raw',
        'content_ru:raw',
        'content_en:raw',
        'price:sum',
        [
            'attribute' => 'category_id',
            'format' => 'raw',
            'value' => function (Service $model) {
                return $model->category ? $model->category->name : '';
            },
        ],
        'statusBadge:raw',
//        'created_by',
//        'updated_by',
//        'created_at',
//        'updated_at',
        'created_at',
        'createdBy.fullname',
        'updated_at',
        'updatedBy.fullname'
    ],
]) ?>
