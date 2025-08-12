<?php


/* @var $this soft\web\View */
/* @var $model common\models\Setting */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sozlamalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \soft\widget\bs4\DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'map',
        'address_uz',
        'address_ru',
        'address_en',
        'description_uz',
        'description_ru',
        'description_en',
        [
            'attribute' => 'imageUrl',
            'label' => Yii::t('app', 'Image'),
            'format' => ['image', ['width' => '40px']]
        ],
        'email',
        'phone',
        'facebook',
        'instagram',
        'telegram',
        'youtube',
        'updated_at',
        'created_at',
        'createdBy.fullname',
        'updated_at',
        'updatedBy.fullname'
    ],
]) ?>
