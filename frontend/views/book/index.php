<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use frontend\models\Book;
use frontend\models\Student;
use frontend\models\Borrowedbook;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List Books';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div class="box box-info">
            <div class="box-header with-border">
              <?php if (Yii::$app->user->Can('librarian')){?>
          <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
        <?php }?>
        <?php if (Yii::$app->user->Can('student')){?>
    <button type="button" class="btn btn-primary borrowbook" aria-controls="example1"><span class="fa fa-plus">borrow book </span></button>
  <?php }?>
              <div style="text-align: center;">
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
              </div>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'bookId',
                        'bookName',
                        'referenceNo',
                        'publisher',
                        'status',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <?php
            Modal::begin([
                'header'=>'<h4>Borrow Book</h4>',
                'id'=>'borrowbook',
                'size'=>'modal-md'
                ]);
            echo "<div id='borrowbookContent'></div>";
            Modal::end();
          ?>
