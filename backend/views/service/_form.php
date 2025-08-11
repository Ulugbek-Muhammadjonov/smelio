<?php

use common\models\ServiceCategory;
use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\file\SingleImageFileInput;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model common\models\Service */

?>


<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'
        ]]); ?>

<?= Form::widget([
        'model' => $model,
        'form' => $form,
        'attributes' => [
                'name',
                'duration',
                'content:ckeditor',
                'image:widget' => [
                        'widgetClass' => SingleImageFileInput::class,
                        'options' => [
                                'initialPreviewUrl' => $model->getImageUrl(),
                        ]
                ],
                'category_id:select2' => [
                        'options' => [
                                'data' => ServiceCategory::map(),
                        ]
                ],
                'price',
                'status:status',
        ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

