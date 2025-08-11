<?php

use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\file\SingleImageFileInput;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model common\models\OurTeam */

?>


<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'
        ]]); ?>

<?= Form::widget([
        'model' => $model,
        'form' => $form,
        'attributes' => [
                'full_name',
                'position',
                'content:ckeditor',
                'image:widget' => [
                        'widgetClass' => SingleImageFileInput::class,
                        'options' => [
                                'initialPreviewUrl' => $model->getImageUrl(),
                        ]
                ],
                'status:status',
                'sort_order',

        ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

