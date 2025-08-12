<?php


/* @var $this soft\web\View */
/* @var $model common\models\MetaSetting */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Meta Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'description',
        'keywords',
        'created_at',
        'createdBy.fullname',
        'updated_at',
        'updatedBy.fullname'
    ],
]) ?>
