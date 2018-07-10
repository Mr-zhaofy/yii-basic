<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'action' => ['about/doo'],
    'method'=>'post',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <?=$form->field($model, 'pic_url')->fileInput(['multiple'=>'multiple']);?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>