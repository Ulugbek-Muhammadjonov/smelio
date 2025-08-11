<?php


/* @var $this soft\web\View */
/* @var $model common\models\ServiceCategory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'name_uz',
        'name_ru',
        'name_en',
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
