<?php


/* @var $this soft\web\View */
/* @var $model common\models\OurAward */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Our Awards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= \soft\widget\bs4\DetailView::widget([
        'model' => $model,
        'attributes' => [
              'id', 
              'image', 
              'status', 
              'created_by', 
              'updated_by', 
              'created_at', 
              'updated_at', 
'created_at',
'createdBy.fullname',
'updated_at',
'updatedBy.fullname'        ],
    ]) ?>
