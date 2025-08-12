<?php

use soft\helpers\Html;
use soft\widget\kartik\ActiveForm;
use soft\widget\kartik\Form;

/* @var $this soft\web\View */
/* @var $model common\models\MetaSetting */

?>


<?php $form = ActiveForm::begin(); ?>

<?= Form::widget([
        'model' => $model,
        'form' => $form,
        'attributes' => [
                'title:textarea',
                'description:textarea',
                'keywords:textarea',
//                'created_by',
//                'updated_by',
        ]
]); ?>
<div class="form-group">
    <?= Html::submitButton(Yii::t('site', 'Save'), ['visible' => !$this->isAjax]) ?>
</div>

<?php ActiveForm::end(); ?>

