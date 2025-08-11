<?php


/* @var $this soft\web\View */
/* @var $model common\models\OurTeam */

$this->title = $model->full_name;
$this->params['breadcrumbs'][] = ['label' => 'Bizing jamoa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'imageUrl',
            'label' => Yii::t('app', 'Image'),
            'format' => ['image', ['width' => '40px']]
        ],
        'full_name',
        'position_uz',
        'position_ru',
        'position_en',
        'content_uz:raw',
        'content_ru:raw',
        'content_en:raw',
        'statusBadge:raw',
        'created_at',
        'createdBy.fullname',
        'updated_at',
        'updatedBy.fullname'
    ],
]) ?>
