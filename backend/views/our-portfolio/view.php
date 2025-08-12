<?php


/* @var $this soft\web\View */
/* @var $model common\models\OurPortfolio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Our Portfolios', 'url' => ['index']];
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
        'sort_order',
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
