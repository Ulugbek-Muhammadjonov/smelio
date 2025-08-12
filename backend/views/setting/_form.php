<?php

use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\file\SingleImageFileInput;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model common\models\Setting */

?>


<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'
        ]]); ?>

<?= Form::widget([
        'model' => $model,
        'form' => $form,
        'attributes' => [
                'address',
                'description:textarea',
                'map:textarea',
                'logo:widget' => [
                        'widgetClass' => SingleImageFileInput::class,
                        'options' => [
                                'initialPreviewUrl' => $model->getImageUrl(),
                        ]
                ],
                'email',
                'phone',
                'facebook',
                'instagram',
                'telegram',
                'youtube',
//                'created_by',
//                'updated_by',
        ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

