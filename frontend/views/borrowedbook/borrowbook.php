<?php
use dosamigos\datepicker\DatePicker;
use frontend\models\Book;
use frontend\models\Student;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Borrowedbook */
/* @var $form ActiveForm */
$books = ArrayHelper::map(Book::find()->where(['status'=>0])->all(), 'bookId', 'bookName');
$students = ArrayHelper::map(Student::find()->all(), 'studentsId', 'fullName');?>
<div class="borrowbook">
    <?php $form = ActiveForm::begin(); ?>

  
        <?= $form->field($model, 'studentId')->dropDownList($students) ?>
        <?= $form->field($model, 'bookId')->dropDownList($books) ?>
        <?= $form->field($model, 'borrowDate')->hiddenInput(['value'=>date('yy/m/d')])->label(false) ?>
         <?= $form->field($model, 'expectedReturn')->widget(
    DatePicker::className(), [
        // inline too, not bad
         'inline' => false,
         // modify template for custom rendering
       // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>
        <div class="form-group">
            <?= Html::submitButton('Confirm', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?></div>
    <!-- borrowbook -->
