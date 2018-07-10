<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([
    'action' => ['index/do'],
    'method'=>'post',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>
    <?= $form->field($model, 'news_title') ?>
    <?= $form->field($model, 'news_desc') ?>
    <?= $form->field($model, 'news_label') ?>
    <?= $form->field($model, 'news_browse_num') ?>
    <?= $form->field($model, 'news_link') ?>
    <?=$form->field($model, 'news_img')->fileInput(['multiple'=>'multiple']);?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>