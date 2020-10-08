<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Student;
use frontend\models\Book;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\BorrowedBook */
/* @var $form ActiveForm */
$students = ArrayHelper::map(Student::find()->all(), 'studentsId', 'fullName');
$books = ArrayHelper::map(Book::find()->all(), 'bookId', 'bookName');

?>
<div class="borrowbook">

    <?php $form = ActiveForm::begin(['id'=>'id']); ?>

    <?= $form->field($model, 'studentId')->dropDownList($students) ?>
    <?= $form->field($model, 'bookId')->dropDownList($books) ?>
   <?= $form->field($model, 'borrowDate')->hiddenInput(['value'=>date('yy/m/d')])->label(false) ?>
     <?= $form->field($model, 'actualReturnDate')->widget(
       DatePicker::className(), [
        'inline' => false,
        'clientOptions' => [
          'autoclose' => true,
          'format' => 'yyyy-mm-dd'
        ]
      ]);?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- borrowbook -->
