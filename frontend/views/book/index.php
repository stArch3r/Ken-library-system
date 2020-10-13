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
        <?php if(Yii::$app->user->can('student')){ ?>
            <button val="<?= Yii::$app->request->baseUrl;?>/borrowedbook/create" type="button" class="btn btn-primary swift" aria-controls="example1"><span class="fa fa-plus">borrow book </span></button>
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
                        [
                                        'label'=>'Book Status',
                                        'format' => 'raw',
                                        'value' => function ($dataProvider) {
                                        $status = Book::find()->where(['bookId'=>$dataProvider->bookId])->one();
                                        if($status->status == 0){
                                            $status = 'Available';
                                            return '<span class="btn btn-info">'.$status.'</span>';
                                        }elseif ($status->status == 1) {
                                            $status = 'Issued';
                                            return '<span class="btn btn-success">'.$status.'</span>';
                                        }elseif ($status->status == 2)
                                        {$status='Pending';
                                        }
                                        return '<span class="btn btn-info ">'.$status.'</span>';
                                        },
                                      ],

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <?php
                  Modal::begin([
                      'header'=>'<h4>Borrow book</h4>',
                      'id'=>'swift',
                      'size'=>'modal-lg',
                      ]);
                  echo "<div id='swiftContent'></div>";
                  Modal::end();
                ?>
