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
$sudents = ArrayHelper::map(Student::find()->all(), 'studentsId', 'fullName');
$books = ArrayHelper::map(Book::find()->where(['status'=>0])->all(), 'bookId', 'bookName');
?>
<div class="approvebook">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'studentId')->dropDownList($sudents,['disabled' => true]) ?>
        <?= $form->field($model, 'bookId')->dropDownList($books,['disabled' => true]) ?>
    <?= $form->field($model, 'borrowDate')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'expectedReturn')->textInput(['disabled' => true]) ?>
        <?= $form->field($model, 'actualReturnDate')->widget(
    DatePicker::className(), [
         'inline' =>false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- approvebook -->
